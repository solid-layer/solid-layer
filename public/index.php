<?php

require dirname(__DIR__) . '/bootstrap/start.php';

$kernel
    ->modules()
    ->run('main')
    ->render();
