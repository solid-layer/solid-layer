<?php

namespace App\Services;

use Bootstrap\Services\Services;
use Phalcon\Session\Adapter\Files as SessionAdapter;

class Session extends Services
{
  public $_alias = 'session';

  public $_shared = true;

  public function dispatcher()
  {
    $session = new SessionAdapter;
    $session->start();

    return $session;
  }
}