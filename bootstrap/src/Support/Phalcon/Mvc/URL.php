<?php

namespace Bootstrap\Support\Phalcon\Mvc;

use Phalcon\Mvc\Url as PhalconMvcUrl;
use Bootstrap\Facades\Response;
use Bootstrap\Facades\Route;

class URL extends PhalconMvcUrl
{
    public function __construct()
    {
        $this->setBaseUri($this->getScheme() . $this->getHost() . '/');
    }

    public function getScheme()
    {
        if (config()->app->ssl) {
            return 'https://';
        }

        return 'http://';
    }

    public function getHost()
    {
        if (isset( $_SERVER[ 'HTTP_HOST' ] )) {
            return $_SERVER[ 'HTTP_HOST' ];
        }

        return config()->app->base_uri;
    }

    public function getRequestUri()
    {
        return $_SERVER[ 'REQUEST_URI' ];
    }

    public function previous()
    {
        return $_SERVER[ 'HTTP_REFERER' ];
    }

    public function route($for, $params = [], $pres = [])
    {
        $params[ 'for' ] = $for;

        return $this->get($params, $pres);
    }

    public function current()
    {
        $actual_link =
            $this->getScheme() . $this->getHost() . $this->getRequestUri();

        return $actual_link;
    }
}