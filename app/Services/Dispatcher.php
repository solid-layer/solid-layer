<?php

namespace App\Services;

use Bootstrap\Services\ServiceContainer;
use Phalcon\Mvc\Dispatcher as MvcDispatcher;
use Phalcon\Events\Manager as EventsManager;
use Bootstrap\Exceptions\ControllerNotFoundException;

class Dispatcher extends ServiceContainer
{
  protected $_alias = 'dispatcher';

  protected $_shared = true;

  public function boot()
  {
    $eventManager = new EventsManager;
    $eventManager->attach("dispatch:beforeException",
      function($event, $dispatcher, $exception)
      {
        switch ($exception->getCode()) {
          case MvcDispatcher::EXCEPTION_HANDLER_NOT_FOUND:
          case MvcDispatcher::EXCEPTION_ACTION_NOT_FOUND:
            if (getenv('APP_DEBUG') != 'true') {
              $dispatcher->forward([
                'namespace'  => 'App\Controllers',
                'controller' => 'Error',
                'action'     => 'show404',
              ]);

              return false;
            }

            throw new ControllerNotFoundException('Handler or Action not found.');

            return false;
        }
      }
    );

    $dispatcher = new MvcDispatcher();
    $dispatcher->setEventsManager($eventManager);

    return $dispatcher;
  }

}