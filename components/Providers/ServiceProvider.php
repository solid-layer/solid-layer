<?php

namespace Components\Providers;

use Exception;
use Clarity\Providers\ServiceProvider as BaseServiceProvider;

class ServiceProvider extends BaseServiceProvider
{
    public function register()
    {
        throw new Exception('An abstract [register] function is needed');
    }
}
