<?php

$loader = new \Phalcon\Loader();

$loader
  ->registerNamespaces([
      'App\Controllers' => APP_ROOT . '/app/Controllers/',
      'App\Migrations'  => APP_ROOT . '/app/Migrations/',
      'App\Models'      => APP_ROOT . '/app/Models/',
      'App\Services'    => APP_ROOT . '/app/Services/',
  ])
  ->register();
