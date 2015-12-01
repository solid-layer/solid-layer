<?php

# Documentation for Frontend Adapters can found here:
# - https://docs.phalconphp.com/en/latest/reference/cache.html#frontend-adapters
#
# For Backend Adapters
# - https://docs.phalconphp.com/en/latest/reference/cache.html#backend-adapters

return [
    'adapters' => [

        'file' => [
            'backend'  => Phalcon\Cache\Backend\File::class,
            'frontend' => Phalcon\Cache\Frontend\Data::class,
            'lifetime' => 172800,
            'options'  => [
                'prefix'   => '',
                'cacheDir' => BASE_PATH . '/storage/cache/',
            ],
        ],

        'redis' => [
            'backend'  => Phalcon\Cache\Backend\Redis::class,
            'frontend' => Phalcon\Cache\Frontend\Data::class,
            'lifetime' => 172800,
            'options'  => [
                'prefix'     => '',
                'host'       => '',
                'port'       => '',
                'auth'       => '',
                'persistent' => false,
                'index'      => '',
            ],
        ],

        'memcache' => [
            'backend'  => Phalcon\Cache\Backend\Memcache::class,
            'frontend' => Phalcon\Cache\Frontend\Data::class,
            'lifetime' => 172800,
            'options'  => [
                'prefix'     => '',
                'host'       => '',
                'port'       => '',
                'persistent' => false,
            ],
        ],

        'mongo' => [
            'backend'  => Phalcon\Cache\Backend\Mongo::class,
            'frontend' => Phalcon\Cache\Frontend\Data::class,
            'lifetime' => 172800,
            'options'  => [
                'prefix'     => '',
                'server'     => '',
                'db'         => '',
                'collection' => '',
            ],
        ],

        'apc' => [
            'backend'  => Phalcon\Cache\Backend\Apc::class,
            'frontend' => Phalcon\Cache\Frontend\Data::class,
            'lifetime' => 172800,
            'options'  => [
                'prefix' => '',
            ],
        ],

        'xcache' => [
            'backend'  => Phalcon\Cache\Backend\Xcache::class,
            'frontend' => Phalcon\Cache\Frontend\Data::class,
            'lifetime' => 172800,
            'options'  => [
                'prefix' => '',
            ],
        ],

    ], # - end of adapters

];
