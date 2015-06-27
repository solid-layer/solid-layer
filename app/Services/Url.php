<?php

namespace App\Services;

use Bootstrap\Services\Services;
use Phalcon\Mvc\Url as UrlResolver;

class Url extends Services
{
  public $_alias = 'url';

  public $_shared = true;

  public function dispatcher()
  {
    $url = new UrlResolver();
    $url->setBaseUri($this->config->application->baseUri);

    return $url;
  }
}