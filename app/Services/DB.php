<?php

namespace App\Services;

use Bootstrap\Services\Service\ServiceContainer;
use Phalcon\Events\Manager as Events_Manager;
use Phalcon\Logger\Adapter\File as FileLogger;
use Phalcon\Db\Adapter\Pdo\Mysql;
use Phalcon\Db\Adapter\Pdo\Postgresql;
use Phalcon\Db\Adapter\Pdo\Sqlite;
use Phalcon\Db\Adapter\Pdo\Oracle;
use Phalcon\Logger;
use Exception;

class DB extends ServiceContainer
{
  public $_alias = 'db';

  public $_shared = false;

  public function boot()
  {
    $db_config = $this->getConfig()->database->toArray();

    $db_adapters = [
        'mysql' => Mysql::class,
        'postgre' => Postgresql::class,
        'sqlite' => Sqlite::class,
        'oracle' => Oracle::class,
    ];

    $selected_adapter = strtolower($db_config['adapter']);

    if (! isset($db_adapters[$selected_adapter]) ) {
        throw new Exception('DB Adapter not found!');
    }

    $logger = new FileLogger(APP_ROOT . '/storage/logs/db.log');

    $event_manager = new Events_Manager;
    $event_manager->attach($this->_alias, function ($event, $conn) use ($logger) {
        if ($event->getType() == 'beforeQuery') {
            $logger->log($conn->getSQLStatement(), Logger::INFO);
        }
    });

    $conn = new $db_adapters[$selected_adapter]($db_config);
    $conn->setEventsManager($event_manager);

    return $conn;
  }
}