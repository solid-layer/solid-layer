<?php

# Documentation for Frontend Adapters found here:
# https://docs.phalconphp.com/en/latest/reference/cache.html#frontend-adapters
#
# For Backend Adapters
# https://docs.phalconphp.com/en/latest/reference/cache.html#backend-adapters

return [
    'adapters' => [

        'file' => [
            'backend'  => Phalcon\Cache\Backend\File::class,
            'frontend' => Phalcon\Cache\Frontend\Data::class,
            'lifetime' => 172800,
            'options'  => [
                'cacheDir' => config('path.root').'/storage/cache/',
                'prefix'   => '_slayer_',
            ],
        ],

        'redis' => [
            'backend'  => Phalcon\Cache\Backend\Redis::class,
            'frontend' => Phalcon\Cache\Frontend\Data::class,
            'lifetime' => 172800,
            'options'  => [
                'host'       => '127.0.0.1',
                'port'       => '6379',
                'persistent' => false,
                'prefix'     => '_slayer_',
            ],
        ],

        'memcache' => [
            'backend'  => Phalcon\Cache\Backend\Memcache::class,
            'frontend' => Phalcon\Cache\Frontend\Data::class,
            'lifetime' => 172800,
            'options'  => [
                'host'       => '127.0.0.1',
                'port'       => '11211',
                'persistent' => false,
                'prefix'     => '_slayer_',
            ],
        ],

        'mongo' => [
            'backend'  => Phalcon\Cache\Backend\Mongo::class,
            'frontend' => Phalcon\Cache\Frontend\Data::class,
            'lifetime' => 172800,
            'options'  => [
                'server'     => '',
                'db'         => '',
                'collection' => '',
                'prefix'     => '_slayer_',
            ],
        ],

        'apc' => [
            'backend'  => Phalcon\Cache\Backend\Apc::class,
            'frontend' => Phalcon\Cache\Frontend\Data::class,
            'lifetime' => 172800,
            'options'  => [
                'prefix' => '_slayer_',
            ],
        ],

        'xcache' => [
            'backend'  => Phalcon\Cache\Backend\Xcache::class,
            'frontend' => Phalcon\Cache\Frontend\Data::class,
            'lifetime' => 172800,
            'options'  => [
                'prefix' => '_slayer_',
            ],
        ],

    ], # end of adapters

];
