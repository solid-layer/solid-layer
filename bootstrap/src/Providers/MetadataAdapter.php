<?php
namespace Bootstrap\Providers;

use Phalcon\Mvc\Model\Metadata\Memory;

class MetadataAdapter extends ServiceProvider
{
    protected $alias  = 'modelsMetadata';
    protected $shared = false;

    public function register()
    {
        return new Memory;
    }
}
