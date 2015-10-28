<?php
namespace Components\Providers\Slayer;

use Bootstrap\Services\Service\ServiceProvider;
use Bootstrap\Support\Phalcon\Mvc\URL as UrlResolver;

class URL extends ServiceProvider
{
    protected $alias  = 'url';
    protected $shared = false;

    public function register()
    {
        $url = new UrlResolver();

        return $url;
    }
}
