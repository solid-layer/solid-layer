<?php
namespace Bootstrap\Providers;

class Response extends ServiceProvider
{
    protected $alias  = 'response';
    protected $shared = false;

    public function register()
    {
        return new \Phalcon\Http\Response;
    }
}
