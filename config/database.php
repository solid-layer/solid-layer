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
            'class'  => Phalcon\Db\Adapter\Pdo\Mysql::class,
            'options' => [
                'host'     => env('DB_HOST', 'localhost'),
                'port'     => env('DB_PORT', 3306),
                'username' => env('DB_USERNAME', 'root'),
                'password' => env('DB_PASSWORD'),
                'dbname'   => env('DB_DATABASE', 'slayer'),
                'charset'  => env('DB_CHARSET', 'utf8'),
            ],
        ],

        'sqlite' => [
            'class'  => Phalcon\Db\Adapter\Pdo\Sqlite::class,
            'options' => [
                'dbname' => base_path('database/slayer.sqlite'),
            ],
        ],

        'pgsql' => [
            'class'  => Phalcon\Db\Adapter\Pdo\Postgresql::class,
            'options' => [
                'host'     => env('DB_HOST', 'localhost'),
                'port'     => env('DB_PORT', 5432),
                'username' => env('DB_USERNAME', 'postgres'),
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
    | Your document storage.
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
