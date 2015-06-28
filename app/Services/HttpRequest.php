<?php

namespace App\Services;

use Bootstrap\Services\ServiceContainer;
use Phalcon\Http\Request;

class HttpRequest extends ServiceContainer
{
  protected $_alias = 'httpRequest';

  protected $_shared = true;

  public function boot()
  {
    return new Request;
  }
}