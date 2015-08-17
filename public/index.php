<?php

use Bootstrap\App;
use App\Exceptions\Handler;

define('SLAYER_START', microtime(true));
define('APP_ROOT', dirname(__DIR__));

# ------------------------------------------------------
# Composer Loader
# ------------------------------------------------------
# - now call the composer autoload, this will require
# all our application dependencies

require_once APP_ROOT . '/vendor/autoload.php';

$system = App::run();

$handler = new Handler;

$handler->report();

echo $system->handle()->getContent();
