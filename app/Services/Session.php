<?php

namespace App\Services;

use Bootstrap\Services\Service\ServiceContainer;
use Phalcon\Session\Adapter\Files as SessionAdapter;

class Session extends ServiceContainer
{
    protected $_alias = 'session';

    protected $_shared = true;

    public function boot()
    {
        $session = new SessionAdapter;
        $session->start();

        return $session;
    }
}