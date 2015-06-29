<?php

namespace App\Services;

use Bootstrap\Services\Service\ServiceContainer;
use Phalcon\Filter;

class HttpFilter extends ServiceContainer
{
  protected $_alias = 'httpFilter';

  protected $_shared = true;

  public function boot()
  {
    return new Filter;
  }
}