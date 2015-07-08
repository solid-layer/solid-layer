<?php

if (! isset($di)) {
  $di = new Phalcon\Di\FactoryDefault();
}

$container = new Bootstrap\Services\Service\ServiceContainer();
foreach (config()->app->services as $provider) {
    $container->addServiceProvider(new $provider);
}