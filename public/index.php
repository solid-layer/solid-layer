<?php

require_once dirname(__DIR__) . '/bootstrap/autoload.php';

$kernel
    // ->run('slayer')     # run specific module
    ->render();         # then render it