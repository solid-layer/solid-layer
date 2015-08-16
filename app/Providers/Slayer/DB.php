<?php

namespace App\Providers\Slayer;

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
        $db_config = config()->database->rdbms;
        if ( ! $db_config->enabled) {
            return $this;
        }

        $drivers = [
            'mysql'   => Mysql::class,
            'postgre' => Postgresql::class,
            'sqlite'  => Sqlite::class,
            'oracle'  => Oracle::class,
        ];

        $selected_driver = strtolower($db_config->driver);

        if ( ! isset( $drivers[ $selected_driver ] )) {

            throw new Exception('DB Adapter ' . $selected_driver . ' not found!');
        }

        # - An event to log our queries
        $event_manager = new Events_Manager;

        $event_manager->attach($this->_alias,

            function ($event, $conn) {

                if ( $event->getType() == 'beforeQuery' ) {

                    $logger = new Logger('DB');
                    $logger->pushHandler(
                        new StreamHandler(
                            config()->path->logsDir . 'db.log',
                            Logger::INFO
                        )
                    );

                    $logger->info($conn->getSQLStatement());
                }
            });

        $conn = new $drivers[ $selected_driver ]($db_config->toArray());

        $conn->setEventsManager($event_manager);

        return $conn;
    }
}