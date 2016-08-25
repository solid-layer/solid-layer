<?php

namespace App\Main\Providers;

use Phalcon\Di\FactoryDefault;
use Clarity\Providers\ServiceProvider;
use Clarity\Contracts\Providers\ModuleInterface;

class RouterServiceProvider extends ServiceProvider implements ModuleInterface
{
    protected $alias = 'main';
    protected $shared = false;

    /**
     * {@inherit}
     */
    public function register()
    {
        return $this;
    }

    /**
     * {@inherit}
     */
    public function module(FactoryDefault $di)
    {
        $di
            ->get('dispatcher')
            ->setDefaultNamespace('App\Main\Controllers');
    }

    /**
     * {@inherit}
     */
    public function afterModuleRun()
    {
        require_once realpath(__DIR__.'/../').'/Routes.php';
    }
}
