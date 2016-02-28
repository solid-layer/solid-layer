<?php
namespace Components\Providers;

use Phalcon\Events\Manager as EventsManager;
use Components\Events\ApplicationEventListener;
use Clarity\Providers\Application as BaseApplication;

class Application extends BaseApplication
{
    public function boot()
    {
        $app = di()->get('application');

        $event_manager = new EventsManager;

        $event_manager->attach('application', new ApplicationEventListener);

        $app->setEventsManager($event_manager);
    }
}
