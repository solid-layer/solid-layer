<?php

namespace App\Providers;

use Bootstrap\Services\Service\ServiceProvider;
use Phalcon\Cache\Backend\File as BackFile;
use Phalcon\Cache\Frontend\Data as FrontData;

class Cache extends ServiceProvider
{
    public $_alias = 'cache';

    public $_shared = false;

    public function register()
    {
        # 2 days cache
        $front_cache = new FrontData(array(
            'lifetime' => 172800
        ));

        $cache = new BackFile($front_cache, [
            'cacheDir' => config()->path->cacheDir,
        ]);

        return $cache;
    }
}