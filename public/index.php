<?php

require dirname(__DIR__) . '/bootstrap/autoload.php';

$kernel
    ->modules()
    ->run('main')
    ->render();
