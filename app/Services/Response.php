<?php

namespace App\Services;

use Bootstrap\Services\Services;

class Response extends Services
{
  public $_alias = 'response';

  public $_shared = true;

  public function dispatcher()
  {
    return new \Phalcon\Http\Response;
  }
}