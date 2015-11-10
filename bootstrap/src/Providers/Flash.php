<?php
namespace Bootstrap\Providers;

use Phalcon\Session\Bag as PhalconSessionBag;

class Flash extends ServiceProvider
{
    protected $alias  = 'flash';
    protected $shared = true;

    public function register()
    {
        return new PhalconSessionBag('flash');
    }
}
