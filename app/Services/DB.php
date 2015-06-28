<?php

namespace App\Services;

use Phalcon\Db\Adapter\Pdo\Mysql as DbAdapter;
use Bootstrap\Services\ServiceContainer;

class DB extends ServiceContainer
{
  public $_alias = 'db';

  public $_shared = false;

  public function boot()
  {
    return new DbAdapter($this->getConfig()->database->toArray());
  }
}