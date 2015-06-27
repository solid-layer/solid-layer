<?php

namespace App\Services;

use Bootstrap\Services\Services;

class Router extends Services
{
  public $_alias = 'router';

  public $_shared = true;

  public function dispatcher()
  {
    return new \Phalcon\Mvc\Router;
  }
}