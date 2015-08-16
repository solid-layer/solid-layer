<?php

namespace App\Providers\Slayer;

use Bootstrap\Services\Service\ServiceProvider;
use Bootstrap\Support\Phalcon\Mvc\Router as PhalconRouter;

class Router extends ServiceProvider
{
    protected $_alias = 'router';

    protected $_shared = false;

    public function register()
    {
        # disable the auto router for controller
        $router = new PhalconRouter(false);

        # add page not found handler
        $router->notFound([
            'controller' => 'error',
            'action'     => 'pageNotFound',
        ]);

        # remove the extra slashes
        $router->removeExtraSlashes(true);


        return $router;
    }
}