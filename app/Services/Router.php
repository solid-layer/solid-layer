<?php

namespace App\Services;

use Bootstrap\Services\Service\ServiceContainer;

class Router extends ServiceContainer
{
    protected $_alias = 'router';

    protected $_shared = false;

    public function boot()
    {
        return new \Phalcon\Mvc\Router(false);
    }
}