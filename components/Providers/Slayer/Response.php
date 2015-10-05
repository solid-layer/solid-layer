<?php

namespace Components\Providers\Slayer;

use Bootstrap\Services\Service\ServiceProvider;

class Response extends ServiceProvider
{
    protected $_alias = 'response';

    protected $_shared = false;

    public function register()
    {
        return new \Phalcon\Http\Response;
    }
}