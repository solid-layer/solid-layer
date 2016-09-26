<?php

return [

    /*
    +----------------------------------------------------------------+
    |\ Database Adapter Settings                                    /|
    +----------------------------------------------------------------+
    |
    | Register your own database adapter or add more index to create
    | multiple 'mysql' class adapter.
    |
    */

    'adapters' => [

        'mysql' => [
            'active' => true,
            'class'  => Phalcon\Db\Adapter\Pdo\Mysql::class,
            'options' => [
                'host'     => env('DB_HOST', 'localhost'),
                'port'     => env('DB_PORT', 3306),
                'username' => env('DB_USERNAME'),
                'password' => env('DB_PASSWORD'),
                'dbname'   => env('DB_DATABASE', 'slayer'),
                'charset'  => env('DB_CHARSET', 'utf8'),
            ],
        ],

        'sqlite' => [
            'active' => false,
            'class'  => Phalcon\Db\Adapter\Pdo\Sqlite::class,
            'options' => [
                'dbname' => base_path('database/slayer.sqlite'),
            ],
        ],

        'pgsql' => [
            'active' => false,
            'class'  => Phalcon\Db\Adapter\Pdo\Postgresql::class,
            'options' => [
                'host'     => env('DB_HOST', 'localhost'),
                'username' => env('DB_USERNAME'),
                'password' => env('DB_PASSWORD'),
                'dbname'   => env('DB_DATABASE', 'slayer'),
            ],
        ],

    ],

    /*
    +----------------------------------------------------------------+
    |\ NO SQL                                                       /|
    +----------------------------------------------------------------+
    |
    | Your Document Storage
    |
    */

    'nosql_adapters' => [

        'mongo1' => [
            'host'     => 'localhost',
            'port'     => '27017',
            'username' => '',
            'password' => '',
            'dbname'   => 'mongo1',
        ],
    ],

]; # end of return
