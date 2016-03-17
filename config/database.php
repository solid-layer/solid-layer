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
            'host'     => env('DB_HOST', 'localhost'),
            'port'     => env('DB_PORT', 3306),
            'username' => env('DB_USERNAME'),
            'password' => env('DB_PASSWORD'),
            'dbname'   => env('DB_DATABASE', 'slayer'),
            'charset'  => env('DB_CHARSET', 'utf8'),
            'class'    => Phalcon\Db\Adapter\Pdo\Mysql::class,
        ],

        'sqlite' => [
            'dbname'   => base_path(env('DB_DATABASE', 'database/slayer.sqlite')),
            'class'    => Phalcon\Db\Adapter\Pdo\Sqlite::class,
        ],

        'pgsql' => [
            'host'     => env('DB_HOST', 'localhost'),
            'username' => env('DB_USERNAME'),
            'password' => env('DB_PASSWORD'),
            'dbname'   => env('DB_DATABASE', 'slayer'),
            'charset'  => env('DB_CHARSET', 'utf8'),
            'class'    => Phalcon\Db\Adapter\Pdo\Postgresql::class,
        ],

        'oracle' => [
            'username' => env('DB_USERNAME'),
            'password' => env('DB_PASSWORD'),
            'dbname'   => env('DB_DATABASE', '//localhost/slayer'),
            'charset'  => env('DB_CHARSET', 'utf8'),
            'class'    => Phalcon\Db\Adapter\Pdo\Oracle::class,
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


    /*
    +----------------------------------------------------------------+
    |\ Phinx Migration                                              /|
    +----------------------------------------------------------------+
    |
    | Migration has a different configuration than using the current
    | database adapters.
    |
    | In which, phinx currently supports most of the adapters that
    | phalcon also supported.
    |
    | Reference:
    | http://docs.phinx.org/en/latest/configuration.html#supported-adapters
    |
    */

    'phinx_migrations' => [

        'mysql' => [
            'adapter'  => 'mysql',
            'host'     => env('DB_HOST', 'localhost'),
            'name'     => env('DB_DATABASE', 'slayer'),
            'user'     => env('DB_USERNAME'),
            'pass'     => env('DB_PASSWORD'),
            'port'     => env('DB_PORT', 3306),
            'charset'  => env('DB_CHARSET', 'utf8'),
        ],
    ],

]; # - end of return
