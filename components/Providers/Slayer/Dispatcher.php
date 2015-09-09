<?php

namespace Components\Providers\Slayer;

use Bootstrap\Exceptions\ControllerNotFoundException;
use Bootstrap\Services\Service\ServiceProvider;
use Phalcon\Mvc\Dispatcher as MvcDispatcher;
use Phalcon\Events\Manager as EventsManager;
use Phalcon\Mvc\Dispatcher\Exception as DispatchException;

class Dispatcher extends ServiceProvider
{
    protected $_alias = 'dispatcher';

    protected $_shared = true;

    public function register()
    {
        $event_manager = new EventsManager;

        $event_manager->attach(
            'dispatch:beforeException',
            function ($event, $dispatcher, $exception) {

                if ($exception instanceof DispatchException) {

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