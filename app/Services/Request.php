<?php

namespace App\Services;

use Bootstrap\Services\Service\ServiceContainer;
use Phalcon\Http\Request as HttpRequest;

class Request extends ServiceContainer
{
  protected $_alias = 'request';

  protected $_shared = false;

  public function boot()
  {
    return new HttpRequest;
  }
}