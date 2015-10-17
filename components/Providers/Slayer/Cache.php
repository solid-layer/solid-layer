<?php
namespace Components\Providers\Slayer;

use Phalcon\Cache\Backend\File as BackFile;
use Phalcon\Cache\Frontend\Data as FrontData;
use Bootstrap\Services\Service\ServiceProvider;

class Cache extends ServiceProvider
{
    public $_alias = 'cache';

    public $_shared = false;

    public function register()
    {
        # 2 days cache
        $lifetime = 172800;

        if (config()->app->debug) {
            $lifetime = 1;
        }

        $front_cache = new FrontData([
            'lifetime' => $lifetime,
        ]);

        $cache = new BackFile($front_cache, [
            'cacheDir' => config()->path->cache,
        ]);

        return $cache;
    }
}