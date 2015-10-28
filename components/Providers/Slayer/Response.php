<?php
namespace Components\Providers\Slayer;

use Bootstrap\Services\Service\ServiceProvider;

class Response extends ServiceProvider
{
    protected $alias  = 'response';
    protected $shared = false;

    public function register()
    {
        return new \Phalcon\Http\Response;
    }
}
