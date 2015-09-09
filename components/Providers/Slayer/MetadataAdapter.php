<?php

namespace Components\Providers\Slayer;

use Bootstrap\Services\Service\ServiceProvider;
use Phalcon\Mvc\Model\Metadata\Memory;

class MetadataAdapter extends ServiceProvider
{
    protected $_alias = 'modelsMetadata';

    protected $_shared = false;

    public function register()
    {
        return new Memory;
    }
}