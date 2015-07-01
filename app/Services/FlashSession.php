<?php

namespace App\Services;

use Bootstrap\Services\Service\ServiceContainer;
use Phalcon\Flash\Session as PFlashSession;

class FlashSession extends ServiceContainer
{
  protected $_alias = 'flashSession';

  protected $_shared = false;

  public function boot()
  {
    $flash_session = new PFlashSession(array(
        'error'   => 'alert alert-danger',
        'success' => 'alert alert-success',
        'notice'  => 'alert alert-info',
        'warning' => 'alert alert-warning'
    ));

    return $flash_session;
  }

}