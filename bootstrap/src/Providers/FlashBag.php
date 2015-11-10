<?php
namespace Bootstrap\Providers;

use Phalcon\Flash\Session as PhalconFlashSession;

class FlashBag extends ServiceProvider
{
    protected $alias  = 'flash_bag';
    protected $shared = false;

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
