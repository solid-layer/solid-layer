<?php

namespace Sandbox;

use Bootstrap\Services\Service\ServiceProvider;

class MySandBoxServiceProvider extends ServiceProvider
{
    protected $_alias = 'sandbox';

    public function getViewsDir()
    {
        return __DIR__ . '/resources/views';
    }

    public function getLangDir()
    {
        return __DIR__ . '/resources/lang';
    }

    public function register()
    {
        require __DIR__ . '/app/routes.php';

        return $this;
    }
}