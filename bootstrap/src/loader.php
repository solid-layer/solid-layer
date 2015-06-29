<?php

$loader = new \Phalcon\Loader();

$config_loader = slayer_config()->loader;

$loader
  ->registerDirs($config_loader->dirs->toArray())
  ->registerNamespaces($config_loader->namespaces->toArray())
  ->register();
