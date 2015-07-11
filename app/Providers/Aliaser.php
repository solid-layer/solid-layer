<?php

namespace App\Providers;

use Bootstrap\Services\Service\ServiceProvider;

class Aliaser extends ServiceProvider
{
    public $_alias = 'aliaser';

    public $_shared = false;

    public function register()
    {
        foreach (config()->app->aliases as $alias => $class) {
            class_alias($class, $alias);
        }

        return $this;
    }
}