<?php

$loader = new \Phalcon\Loader();

$config_loader = $__config->loader;

$loader
  ->registerDirs($config_loader->dirs->toArray())
  ->registerNamespaces($config_loader->namespaces->toArray())
  ->register();
