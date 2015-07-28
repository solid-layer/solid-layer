<?php

namespace App\Providers\Slayer;

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
                      $dispatcher->forward(array(
                          'controller' => 'error',
                          'action'     => 'whoops'
                      ));

                      return false;
                    }

                    throw new ControllerNotFoundException($exception->getMessage());

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