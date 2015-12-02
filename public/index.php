<?php

require dirname(__DIR__) . '/bootstrap/autoload.php';

$kernel
    ->run('main')
    ->render();
