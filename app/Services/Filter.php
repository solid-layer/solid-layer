<?php

namespace App\Services;

use Bootstrap\Services\Service\ServiceContainer;
use Phalcon\Filter as HttpFilter;

class Filter extends ServiceContainer
{
  protected $_alias = 'filter';

  protected $_shared = false;

  public function boot()
  {
    return new HttpFilter;
  }
}