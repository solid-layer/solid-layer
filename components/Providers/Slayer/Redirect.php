<?php
namespace Components\Providers\Slayer;

use Bootstrap\Services\Service\ServiceProvider;
use Bootstrap\Support\Redirect\Redirect as SupportRedirect;

class Redirect extends ServiceProvider
{
    protected $_alias = 'redirect';

    protected $_shared = false;

    public function register()
    {
        return new SupportRedirect;
    }
}