<?php

namespace App\Providers;

use Bootstrap\Exceptions\ControllerNotFoundException;
use Bootstrap\Services\Service\ServiceProvider;
use Phalcon\Mvc\Dispatcher as MvcDispatcher;
use Phalcon\Events\Manager as EventsManager;
use Phalcon\Mvc\Dispatcher\Exception as DispatchException;
use Phalcon\Logger\Adapter\File as FileAdapter;

class Dispatcher extends ServiceProvider
{
  protected $_alias = 'dispatcher';

  protected $_shared = true;

  public function register()
  {
    $event_manager = new EventsManager;
    $event_manager->attach("dispatch:beforeException",
      function($event, $dispatcher, $exception) {

        $logger = new FileAdapter(config()->path->logsDir . 'error.log');
        $logger->error($exception->getMessage());

        if ($exception instanceof DispatchException) {
            if (config()->app->debug != 'true') {
              echo $dispatcher->getDI()->get('view')->take('error.whoops');
              exit;

              // $dispatcher->forward(array(
              //     'controller' => 'pages',
              //     'action'     => 'show404'
              // ));
            }

            throw new ControllerNotFoundException('Handler or Action not found.');

            return false;
        }
      }
    );

    $dispatcher = new MvcDispatcher();
    $dispatcher->setEventsManager($event_manager);
    $dispatcher->setDefaultNamespace('App\Controllers');

    return $dispatcher;
  }

}