<?php
namespace Components\Providers\Slayer;

use Phalcon\Http\Request as HttpRequest;
use Bootstrap\Services\Service\ServiceProvider;

class Request extends ServiceProvider
{
    protected $alias  = 'request';
    protected $shared = false;

    public function register()
    {
        return new HttpRequest;
    }
}
