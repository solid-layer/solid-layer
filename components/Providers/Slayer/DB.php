<?php
namespace Components\Providers\Slayer;

use Exception;
use Monolog\Logger;
use Phalcon\Db\Adapter\Pdo\Mysql;
use Monolog\Handler\StreamHandler;
use Phalcon\Db\Adapter\Pdo\Sqlite;
use Phalcon\Db\Adapter\Pdo\Oracle;
use Phalcon\Db\Adapter\Pdo\Postgresql;
use Phalcon\Events\Manager as EventsManager;
use Bootstrap\Services\Service\ServiceProvider;

class DB extends ServiceProvider
{
    public $_alias = 'db';

    public $_shared = false;

    public function register()
    {
        $app = config()->app;


        # - If empty, then disable DB by just returning itself

        if ( strlen($app->db_adapter) == 0 ) {
            return $this;
        }


        $drivers = [
            'mysql'  => Mysql::class,
            'pgsql'  => Postgresql::class,
            'sqlite' => Sqlite::class,
            'oracle' => Oracle::class,
        ];

        $selected_driver = strtolower($app->db_adapter);


        # - Check if the drivers found in the lists

        if ( ! isset( $drivers[ $selected_driver ] )) {

            throw new Exception('DB Adapter ' . $selected_driver . ' not found!');
        }


        # - An event to log our queries

        $event_manager = new EventsManager;
        $event_manager->attach(
            $this->_alias,
            function ($event, $conn) {

                if ( $event->getType() == 'beforeQuery' ) {
                    $logger = new Logger('DB');
                    $logger->pushHandler(
                        new StreamHandler(
                            config()->path->logs . 'db.log',
                            Logger::INFO
                        )
                    );

                    $variables = $conn->getSQLVariables();
                    if ( $variables ) {
                        $logger->info($conn->getSQLStatement() . ' ['. join(',', $variables) . ']');
                    } else {
                        $logger->info($conn->getSQLStatement());
                    }
                }
            }
        );


        # - Instantiate the class and get the adapter

        $conn = new $drivers[ $selected_driver ](
            config()
                ->database
                ->adapters
                ->{$selected_driver}
                ->toArray()
        );


        $conn->setEventsManager($event_manager);

        return $conn;
    }
}