<?php

return  [
    'adapter'     => getenv('DB_ADAPTER'),
    'host'        => getenv('DB_HOST'),
    'port'        => getenv('DB_PORT'),
    'username'    => getenv('DB_USERNAME'),
    'password'    => getenv('DB_PASSWORD'),
    'dbname'      => getenv('DB_DATABASE'),
    'charset'     => getenv('DB_CHARSET'),
];