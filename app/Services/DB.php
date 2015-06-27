<?php

namespace App\Services;

use Phalcon\Db\Adapter\Pdo\Mysql as DbAdapter;
use Bootstrap\Services\Services;

class DB extends Services
{
  public $_alias = 'db';

  public $_shared = false;

  public function dispatcher()
  {
    return new DbAdapter($this->config->database->toArray());
  }
}