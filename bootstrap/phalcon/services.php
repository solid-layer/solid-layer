<?php

$di = new Phalcon\Di\FactoryDefault();

$dispatcher = new Bootstrap\Services\Dispatcher($di, $config);
foreach ($config->slayer_services as $service) {
    $dispatcher->dispatch($service);
}

$di = $dispatcher->getDi();
