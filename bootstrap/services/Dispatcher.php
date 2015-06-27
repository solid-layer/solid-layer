<?php

namespace Bootstrap\Services;

class Dispatcher
{
  private $di;
  private $config;

  public function __construct($di, $config)
  {
    $this->di = $di;
    $this->config = $config;
  }

  public function dispatch($service)
  {
    $obj = new $service($this->config);

    if (! $obj->hasAlias()) {
      throw new \Bootstrap\Exceptions\ServiceAliasNotFoundException('Alias not found on a class');
    }

    $this->di
      ->set(
          $obj->getAlias(), 
          $obj->getDispatcher(), 
          $obj->getShared()
      );

    return $this;
  }

  public function getDi()
  {
    return $this->di;
  }
}