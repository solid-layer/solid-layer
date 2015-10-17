<?php
namespace Components\Providers\Slayer;

use Phalcon\Http\Request as HttpRequest;
use Bootstrap\Services\Service\ServiceProvider;

class Request extends ServiceProvider
{
    protected $_alias = 'request';

    protected $_shared = false;

    public function register()
    {
        return new HttpRequest;
    }
}