<?php

return [

    # ----------------------------------------------------------------
    # Database Adapter Settings
    # ----------------------------------------------------------------
    # - It will based on your database

    'adapters' => [

        'sqlite' => [
            'dbname'   => base_path(env('DB_DATABASE', 'database/slayer.sqlite')),
            'class'    => Phalcon\Db\Adapter\Pdo\Sqlite::class,
        ],

        'mysql' => [
            'host'     => env('DB_HOST', 'localhost'),
            'port'     => env('DB_PORT', 3306),
            'username' => env('DB_USERNAME'),
            'password' => env('DB_PASSWORD'),
            'dbname'   => env('DB_DATABASE', 'slayer'),
            'charset'  => env('DB_CHARSET', 'utf8'),
            'class'    => Phalcon\Db\Adapter\Pdo\Mysql::class,
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


    # ----------------------------------------------------------------
    # MongoDB
    # ----------------------------------------------------------------
    # - Your nosql document storage

    'mongo' => [
        'enable' => false,
        'host'   => 'mongodb:///tmp/mongodb-27017.sock,localhost:27017',
        'dbname' => 'slayer',
    ],

]; # - end of return
