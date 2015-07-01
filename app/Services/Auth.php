<?php

namespace App\Services;

use Bootstrap\Services\Service\ServiceContainer;
use Bootstrap\Support\Auth\Auth as SlayerAuth;

class Auth extends ServiceContainer
{
    public $_alias = 'slayer_auth';

    public $_shared = false;

    public function boot()
    {
        return new SlayerAuth;
    }
}