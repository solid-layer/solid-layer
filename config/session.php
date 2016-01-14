<?php

return [

    'file' => [
        'class' => Phalcon\Session\Adapter\Files::class,
    ],

    'memcache' => [
        'class' => Phalcon\Session\Adapter\Memcache::class,
        'config' => [
            'host'       => 'localhost',
            'port'       => 11211,
            'persistent' => false,
            'lifetime'   => 3600,
            'prefix'     => 'slayer_',
        ],
    ],

    'redis' => [
        'class' => Phalcon\Session\Adapter\Redis::class,
        'config' => [
            'host'       => 'localhost',
            'port'       => 6379,
            'persistent' => false,
            'lifetime'   => 3600,
            'prefix'     => 'slayer_'
        ],
    ],
];
