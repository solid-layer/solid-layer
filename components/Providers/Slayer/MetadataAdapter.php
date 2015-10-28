<?php
namespace Components\Providers\Slayer;

use Phalcon\Mvc\Model\Metadata\Memory;
use Bootstrap\Services\Service\ServiceProvider;

class MetadataAdapter extends ServiceProvider
{
    protected $alias  = 'modelsMetadata';
    protected $shared = false;

    public function register()
    {
        return new Memory;
    }
}
