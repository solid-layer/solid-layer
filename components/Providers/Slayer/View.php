<?php
namespace Components\Providers\Slayer;

use Bootstrap\Adapters\Volt\VoltAdapter;
use Bootstrap\Adapters\Blade\BladeAdapter;
use Phalcon\Events\Manager as EventsManager;
use Bootstrap\Services\Service\ServiceProvider;
use Phalcon\Mvc\View\Engine\Php as PhalconEnginePhp;
use Bootstrap\Support\Phalcon\Mvc\View as PhalconView;
use Phalcon\Mvc\View\Engine\Volt as PhalconVoltEngine;

class View extends ServiceProvider
{
    protected $alias  = 'view';
    protected $shared = true;

    public function register()
    {
        $view = new PhalconView();
        $view->setViewsDir(config()->path->views);

        $view->registerEngines([
            '.blade.php' => BladeAdapter::class,
            '.phtml'     => PhalconEnginePhp::class,
            '.volt'      => VoltAdapter::class,
        ]);

        $this->callEvents($view);

        return $view;
    }

    private function callEvents($view)
    {
        # - instantiate a new event manager

        $event_manager = new EventsManager;


        # - after rendering the view
        # by default, we should destroy the flash

        $event_manager->attach("view:afterRender",
            function (
                \Phalcon\Events\Event $event,
                PhalconView $dispatcher,
                \Components\Providers\Slayer\View $exception
            ) {

                # - this should destroy the flash

                $flash = $dispatcher->getDI()->get('flash');
                $flash->destroy();
            }
        );


        $view->setEventsManager($event_manager);


        return $this;
    }
}
