<?php

namespace App\Services;

use Bootstrap\Services\Service\ServiceContainer;

class Response extends ServiceContainer
{
    protected $_alias = 'response';

    protected $_shared = false;

    public function boot()
    {
        return new \Phalcon\Http\Response;
    }
}