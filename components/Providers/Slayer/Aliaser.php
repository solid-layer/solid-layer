<?php
namespace Components\Providers\Slayer;

use Bootstrap\Services\Service\ServiceProvider;

class Aliaser extends ServiceProvider
{
    protected $alias = 'aliaser';
    protected $shared = false;

    public function register()
    {
        foreach (config()->app->aliases as $alias => $class) {
            class_alias($class, $alias);
        }

        return $this;
    }
}
