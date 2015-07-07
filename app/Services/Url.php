<?php

namespace App\Services;

use Bootstrap\Services\Service\ServiceContainer;
use Bootstrap\Support\Phalcon\Mvc\URL as UrlResolver;

class URL extends ServiceContainer
{
    protected $_alias = 'url';

    protected $_shared = false;

    public function boot()
    {
        $url = new UrlResolver();
        $url->setBaseUri(getenv('BASE_URI'));

        return $url;
    }
}