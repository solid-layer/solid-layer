<?php

return [

    # ----------------------------------------------------------------
    # Database Adapter Settings
    # ----------------------------------------------------------------
    # -

    'adapters' => [

        'sqlite' => [
            'driver'   => 'sqlite',
            'dbname'   => base_path(env('DB_DATABASE', 'database/slayer.sqlite')),
        ],

        'mysql' => [
            'driver'   => 'mysql',
            'host'     => env('DB_HOST'    , 'localhost'),
            'port'     => env('DB_PORT'    , 3306),
            'username' => env('DB_USERNAME'),
            'password' => env('DB_PASSWORD'),
            'dbname'   => env('DB_DATABASE', 'slayer'),
            'charset'  => env('DB_CHARSET' , 'utf8'),
        ],

        'pgsql' => [
            'driver'   => 'pgsql',
            'host'     => env('DB_HOST'    , 'localhost'),
            'username' => env('DB_USERNAME'),
            'password' => env('DB_PASSWORD'),
            'dbname'   => env('DB_DATABASE', 'slayer'),
            'charset'  => env('DB_CHARSET' , 'utf8'),
        ],

        'oracle' => [
            'driver'   => 'oracle',
            'username' => env('DB_USERNAME'),
            'password' => env('DB_PASSWORD'),
            'dbname'   => env('DB_DATABASE', '//localhost/slayer'),
            'charset'  => env('DB_CHARSET' , 'utf8'),
        ],
    ],


    # ----------------------------------------------------------------
    # MongoDB
    # ----------------------------------------------------------------
    # - Enable your nosql as your database

    'mongo' => [
        'enabled'  => false,
        'host'     => 'mongodb:///tmp/mongodb-27017.sock,localhost:27017',
        'dbname'   => 'slayer',
    ],

]; # - end of return
