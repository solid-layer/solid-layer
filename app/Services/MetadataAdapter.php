<?php

namespace App\Services;

use Bootstrap\Services\ServiceContainer;
use Phalcon\Mvc\Model\Metadata\Memory;

class MetadataAdapter extends ServiceContainer
{
  public $_alias = 'modelsMetadata';

  public $_shared = false;

  public function boot()
  {
    return new Memory();
  }
}