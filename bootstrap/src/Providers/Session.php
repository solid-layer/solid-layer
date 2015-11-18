<?php
namespace Bootstrap\Providers;

use Phalcon\Session\Adapter\Files as SessionAdapter;

class Session extends ServiceProvider
{
    protected $alias  = 'session';
    protected $shared = false;

    public function register()
    {
        $session = new SessionAdapter;
        session_name(config()->app->session);
        $session->start();

        return $session;
    }
}
