<?php

require_once dirname(__DIR__) . '/bootstrap/autoload.php';

$kernel
    ->run('main')
    ->render();