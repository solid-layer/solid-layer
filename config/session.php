<?php

return [

    'file' => [
        'class'   => Clarity\Support\Phalcon\Session\Files::class,
        'options' => [
            'encrypted'       => true,
            'session_storage' => url_trimmer(config()->path->storage.'/session'),
        ],
    ],

    'memcache' => [
        'class'   => Phalcon\Session\Adapter\Memcache::class,
        'options' => [
            'host'       => 'localhost',
            'port'       => 11211,
            'persistent' => false,
            'lifetime'   => 3600,
            'prefix'     => 'slayer_',
        ],
    ],

    'redis' => [
        'class'   => Phalcon\Session\Adapter\Redis::class,
        'options' => [
            'host'       => 'localhost',
            'port'       => 6379,
            'persistent' => false,
            'lifetime'   => 3600,
            'prefix'     => 'slayer_',
        ],
    ],
];
