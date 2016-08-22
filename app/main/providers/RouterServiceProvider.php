<?php

namespace App\Main\Providers;

use Phalcon\Di\FactoryDefault;
use Clarity\Providers\ServiceProvider;

class RouterServiceProvider extends ServiceProvider
{
    protected $alias = 'main';
    protected $shared = false;

    public function module(FactoryDefault $di)
    {
        $di
            ->get('dispatcher')
            ->setDefaultNamespace('App\Main\Controllers');
    }

    public function register()
    {
        require_once realpath(__DIR__.'/../').'/routes.php';
    }
}
