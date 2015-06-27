<?php

namespace App\Services;

use Phalcon\Mvc\Model\Metadata\Memory;
use Bootstrap\Services\Services;

class MetadataAdapter extends Services
{
  public $_alias = 'modelsMetadata';

  public $_shared = false;

  public function dispatcher()
  {
    return new Memory();
  }
}