<?php

namespace App\Services;

use Bootstrap\Services\Service\ServiceContainer;
use Bootstrap\Support\Redirect\Redirect as SupportRedirect;

class Redirect extends ServiceContainer
{
    protected $_alias = 'redirect';

    protected $_shared = false;

    public function boot()
    {
        return new SupportRedirect;
    }
}