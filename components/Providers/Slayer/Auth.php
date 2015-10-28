<?php
namespace Components\Providers\Slayer;

use Bootstrap\Support\Auth\Auth as SlayerAuth;
use Bootstrap\Services\Service\ServiceProvider;

class Auth extends ServiceProvider
{
    protected $alias  = 'auth';
    protected $shared = false;

    public function register()
    {
        return new SlayerAuth;
    }
}
