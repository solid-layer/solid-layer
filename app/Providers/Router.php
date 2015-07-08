<?php

namespace App\Providers;

use Bootstrap\Services\Service\ServiceProvider;

class Router extends ServiceProvider
{
    protected $_alias = 'router';

    protected $_shared = false;

    public function register()
    {
        $router = new \Phalcon\Mvc\Router(false);
        $router->removeExtraSlashes(true);

        return $router;
    }
}