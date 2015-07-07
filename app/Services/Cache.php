<?php

namespace App\Services;

use Bootstrap\Services\Service\ServiceContainer;
use Phalcon\Cache\Backend\File as BackFile;
use Phalcon\Cache\Frontend\Data as FrontData;

class Cache extends ServiceContainer
{
    public $_alias = 'cache';

    public $_shared = false;

    public function boot()
    {
        # 2 days cache
        $front_cache = new FrontData(array(
            "lifetime" => 172800
        ));

        $cache = new BackFile($front_cache, [
            "cacheDir" => $this->getConfig()->path->cacheDir,
        ]);

        # pre-cache the config file
        $config_cache_key = 'slayer_config.cache';
        if ($this->getConfig()->app->cache) {
            if ( empty($cache->get($config_cache_key)) ) {
                $cache->save($config_cache_key, $this->getConfig()->toArray()); 
            }
        } 

        # if config cache is false
        else {
            $cache->delete($config_cache_key);
        }

        return $cache;
    }
}