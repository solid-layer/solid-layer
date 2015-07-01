<?php

namespace App\Services;

use Bootstrap\Services\Service\ServiceContainer;
use Phalcon\Mvc\Url as UrlResolver;

class URL extends ServiceContainer
{
    protected $_alias = 'url';

    protected $_shared = false;

    public function boot()
    {
        $url = new UrlResolver();
        $url->setBaseUri('/');

        return $url;
    }
}