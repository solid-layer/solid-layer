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
        $router = new PhalconRouter(false);
        $router->removeExtraSlashes(true);

        return $router;
    }
}