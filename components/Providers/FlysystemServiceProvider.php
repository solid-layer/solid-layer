<?php
namespace Components\Providers;

use Aws\Sdk;
use League\Flysystem\Filesystem;
use League\Flysystem\MountManager;
use Bootstrap\Services\Service\ServiceProvider;

class FlysystemServiceProvider extends ServiceProvider
{
    protected $alias  = 'flysystem';
    protected $shared = true;

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