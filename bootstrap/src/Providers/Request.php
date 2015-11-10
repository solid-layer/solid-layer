<?php
namespace Bootstrap\Providers;

use Phalcon\Http\Request as HttpRequest;

class Request extends ServiceProvider
{
    protected $alias  = 'request';
    protected $shared = false;

    public function register()
    {
        return new HttpRequest;
    }
}
