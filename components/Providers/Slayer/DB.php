<?php

namespace Components\Providers\Slayer;

use Bootstrap\Services\Service\ServiceProvider;
use Phalcon\Events\Manager as Events_Manager;
use Phalcon\Db\Adapter\Pdo\Mysql;
use Phalcon\Db\Adapter\Pdo\Postgresql;
use Phalcon\Db\Adapter\Pdo\Sqlite;
use Phalcon\Db\Adapter\Pdo\Oracle;
use Monolog\Handler\StreamHandler;
use Monolog\Logger;
use Exception;

class DB extends ServiceProvider
{
    public $_alias = 'db';

    public $_shared = false;

    public function register()
    {
        $db_config = config()->database;

        # ------------------------------------------------------
        # - If empty, then disable DB by just returning itself
        # ------------------------------------------------------

        if ( strlen($db_config->adapter) == 0 ) {
            return $this;
        }


        $drivers = [
            'mysql'   => Mysql::class,
            'pgsql' => Postgresql::class,
            'sqlite'  => Sqlite::class,
            'oracle'  => Oracle::class,
        ];

        $selected_driver = strtolower($db_config->adapter);


        # ------------------------------------------------------
        # - Check if the drivers found in the lists
        # ------------------------------------------------------

        if ( ! isset( $drivers[ $selected_driver ] )) {

            throw new Exception('DB Adapter ' . $selected_driver . ' not found!');
        }


        # ------------------------------------------------------
        # - An event to log our queries
        # ------------------------------------------------------

        $event_manager = new Events_Manager;
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

                    $logger->info($conn->getSQLStatement());
                }
            }
        );


        # ------------------------------------------------------
        # - Instantiate the class and get the adapter
        # ------------------------------------------------------

        $conn = new $drivers[ $selected_driver ](
            $db_config
                ->adapters
                ->{$selected_driver}
                ->toArray()
        );

        $conn->setEventsManager($event_manager);

        return $conn;
    }
}