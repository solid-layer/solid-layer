<?php

namespace App\Providers\Slayer;

use Bootstrap\Services\Service\ServiceProvider;
use Phalcon\Session\Adapter\Files as SessionAdapter;

class Session extends ServiceProvider
{
    protected $_alias = 'session';

    protected $_shared = true;

    public function register()
    {
        $session = new SessionAdapter;
        $session->start();

        return $session;
    }
}