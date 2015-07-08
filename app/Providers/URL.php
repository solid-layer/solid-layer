<?php

namespace App\Providers;

use Bootstrap\Services\Service\ServiceProvider;
use Bootstrap\Support\Phalcon\Mvc\URL as UrlResolver;

class URL extends ServiceProvider
{
    protected $_alias = 'url';

    protected $_shared = false;

    public function register()
    {
        $url = new UrlResolver();
        $url->setBaseUri(getenv('BASE_URI'));

        return $url;
    }
}