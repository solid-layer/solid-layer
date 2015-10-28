<?php

define('BASE_PATH', dirname(__DIR__));
define('SLAYER_START', microtime(true));

require __DIR__ . '/src/Kernel.php';

$kernel = (new Kernel(BASE_PATH))->bootstrap();
