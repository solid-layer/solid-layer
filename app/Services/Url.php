<?php

namespace App\Services;

use Bootstrap\Services\ServiceContainer;
use Phalcon\Mvc\Url as UrlResolver;

class Url extends ServiceContainer
{
  public $_alias = 'url';

  public $_shared = true;

  public function boot()
  {
    $url = new UrlResolver();
    $url->setBaseUri($this->getConfig()->application->baseUri);

    return $url;
  }
}