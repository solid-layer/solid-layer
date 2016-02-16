<?php
namespace Components\Providers;

use Phalcon\Events\Manager as EventsManager;
use Components\Events\DispatcherEventListener;
use Clarity\Providers\Dispatcher as BaseDispatcher;

class Dispatcher extends BaseDispatcher
{
    public function boot()
    {
        $dispatcher = di()->get('dispatcher');

        $event_manager = new EventsManager;

        $event_manager->attach('dispatch', new DispatcherEventListener);

        $dispatcher->setEventsManager($event_manager);
    }
}
