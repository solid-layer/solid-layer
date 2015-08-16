<?php

return [

    'rdbms' => [
        'enabled'  => true,

        # - You may use mysql, postgre, sqlite, oracle
        'driver'   => env('DB_ADAPTER', 'mysql'),
        'host'     => env('DB_HOST', 'localhost'),
        'port'     => env('DB_PORT', 3306),
        'username' => env('DB_USERNAME', 'root'),
        'password' => env('DB_PASSWORD', 'password'),
        'dbname'   => env('DB_DATABASE', 'slayer'),
        'charset'  => env('DB_CHARSET', 'utf8'),
    ],

    'mongo' => [
        'enabled'  => false,

        'host'     => 'mongodb:///tmp/mongodb-27017.sock,localhost:27017',
        'dbname'   => 'slayer',
    ],
];