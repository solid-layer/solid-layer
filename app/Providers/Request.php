<?php

namespace App\Providers;

use Bootstrap\Services\Service\ServiceProvider;
use Phalcon\Http\Request as Http_Request;

class Request extends ServiceProvider
{
  protected $_alias = 'request';

  protected $_shared = false;

  public function register()
  {
    return new Http_Request;
  }
}