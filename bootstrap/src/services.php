<?php

if (! isset($di)) {
  $di = new Phalcon\Di\FactoryDefault();
}

$provider = new Bootstrap\Services\ServiceProvider([
  'app' => $__app,
  'di' => $di,
  'config' => $config,
]);
foreach ($config->slayer_services as $service) {
    $provider->dispatch($service);
}