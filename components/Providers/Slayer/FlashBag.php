<?php

namespace Components\Providers\Slayer;

use Bootstrap\Services\Service\ServiceProvider;
use Phalcon\Flash\Session as PhalconFlashSession;

class FlashBag extends ServiceProvider
{
    protected $_alias = 'flash_bag';

    protected $_shared = false;

    public function register()
    {
        $flash_session = new PhalconFlashSession([
            'error'   => 'alert alert-danger',
            'success' => 'alert alert-success',
            'notice'  => 'alert alert-info',
            'warning' => 'alert alert-warning',
        ]);

        return $flash_session;
    }

}