<?php

if (! isset($di)) {
  $di = new Phalcon\Di\FactoryDefault();
}

$provider = new Bootstrap\Services\Service\ServiceProvider();
foreach (slayer_config()->services as $service) {
    $provider->dispatch(new $service);
}