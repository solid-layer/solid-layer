<?php

namespace Components\Providers;

use Aws\Sdk;
use Bootstrap\Services\Service\ServiceProvider;
use League\Flysystem\MountManager;
use League\Flysystem\Filesystem;

class FlysystemServiceProvider extends ServiceProvider
{
    protected $_alias = 'flysystem';
    protected $_shared = true;

    public function register()
    {
        $manager = $this->manager();

        di()->set('flysystem_manager', function() use ($manager) {
            return $manager;
        }, true);

        return $manager->getFilesystem(config()->app->flysystem);
    }

    protected function manager()
    {
        $flies = [];

        foreach (config()->flysystem as $prefix => $fly) {
            $instance = new $fly['class']($fly['config']->toArray());

            $flies[$prefix] = new Filesystem($instance->adapter());
        }

        return new MountManager($flies);
    }

}