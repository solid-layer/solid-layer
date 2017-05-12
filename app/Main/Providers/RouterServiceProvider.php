<?php

namespace App\Main\Providers;

use Phalcon\Di;
use Clarity\Providers\ServiceProvider;
use Clarity\Contracts\Providers\ModuleInterface;

class RouterServiceProvider extends ServiceProvider implements ModuleInterface
{
    public function boot()
    {
        resolve('module')->setModule('main', function () {
            resolve('dispatcher')->setDefaultNamespace('App\Main\Controllers');
        });
    }

    /**
     * {@inherit}
     */
    public function register()
    {
        $this->app->instance('main', $this);
    }

    /**
     * {@inherit}
     */
    public function afterModuleRun()
    {
        require_once realpath(__DIR__.'/../').'/Routes.php';
    }
}
