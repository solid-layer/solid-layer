<?php

return [

    'file' => [
        'class' => Clarity\Support\Phalcon\Session\Files::class,

        # http://php.net/manual/en/function.session-set-cookie-params.php
        'config' => [
            'lifetime' => 3600,
            'path'     => '/',
            'domain'   => '',
            'secure'   => false,
            'httponly' => true,
        ],
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
            'prefix'     => 'slayer_',
        ],
    ],
];
