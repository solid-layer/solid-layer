<?php
namespace Bootstrap\Providers;

use Phalcon\Session\Adapter\Files as SessionAdapter;

class Session extends ServiceProvider
{
    protected $alias  = 'session';
    protected $shared = true;

    public function register()
    {
        $session = new SessionAdapter;
        $session->start();

        return $session;
    }
}
