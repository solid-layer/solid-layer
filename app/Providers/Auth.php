<?php

namespace App\Providers;

use Bootstrap\Services\Service\ServiceProvider;
use Bootstrap\Support\Auth\Auth as SlayerAuth;

class Auth extends ServiceProvider
{
    public $_alias = 'auth';

    public $_shared = false;

    public function register()
    {
        return new SlayerAuth;
    }
}