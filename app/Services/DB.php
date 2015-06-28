<?php

namespace App\Services;

use Bootstrap\Services\ServiceContainer;
use Phalcon\Db\Adapter\Pdo\Mysql as DbAdapter;

class DB extends ServiceContainer
{
  public $_alias = 'db';

  public $_shared = false;

  public function boot()
  {
    return new DbAdapter($this->getConfig()->database->toArray());
  }
}