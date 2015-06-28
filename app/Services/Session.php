<?php

namespace App\Services;

use Bootstrap\Services\ServiceContainer;
use Phalcon\Session\Adapter\Files as SessionAdapter;

class Session extends ServiceContainer
{
  public $_alias = 'session';

  public $_shared = true;

  public function boot()
  {
    $session = new SessionAdapter;
    $session->start();

    return $session;
  }
}