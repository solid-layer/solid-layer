<?php

namespace Bootstrap\Services;

use Bootstrap\Exceptions\ServiceAliasNotFoundException;

class ServiceProvider
{
  protected $array_config;

  public function __construct($array_config)
  {
    $this->array_config = $array_config;
  }

  public function dispatch($service)
  {
    $obj = new $service($this->array_config);

    if (! $obj->hasAlias()) {
      throw new ServiceAliasNotFoundException('protected $_alias not found on service "' . $service . '"');
    }

    $obj->afterBoot();

    $this->array_config['di']
      ->set(
          $obj->getAlias(), 
          $obj->getBoot(), 
          $obj->getShared()
      );

    $obj->beforeBoot();

    return $this;
  }
}