<?php

namespace Components\Providers;

use Aws\Sdk;
use Bootstrap\Services\Service\ServiceProvider;

class AwsServiceProvider extends ServiceProvider
{
    protected $_alias = 'aws';

    public function register()
    {
        return new Sdk(config()->aws->toArray());
    }
}