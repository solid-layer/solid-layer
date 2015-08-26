<?php

define('BASE_PATH', dirname(__DIR__));

require __DIR__ . '/src/App.php';

$kernel = (new App(BASE_PATH))->bootstrap();