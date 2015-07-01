<?php

namespace App\Services;

use Bootstrap\Services\Service\ServiceContainer;
use Phalcon\Mvc\Model\Metadata\Memory;

class MetadataAdapter extends ServiceContainer
{
    protected $_alias = 'modelsMetadata';

    protected $_shared = false;

    public function boot()
    {
        return new Memory();
    }
}