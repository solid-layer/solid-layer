<?php

namespace App\Main\Providers;

use Clarity\Providers\ServiceProvider;
use Clarity\Contracts\Providers\ModuleInterface;

/**
 * A route service for 'main' module.
 *
 * To make this module work, register this inside [config/app.php], under 'services' key.
 */
class RouterServiceProvider extends ServiceProvider implements ModuleInterface
{
    /**
     * {@inheritdoc}
     */
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
