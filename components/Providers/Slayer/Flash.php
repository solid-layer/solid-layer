<?php
namespace Components\Providers\Slayer;

use Phalcon\Session\Bag as PhalconSessionBag;
use Bootstrap\Services\Service\ServiceProvider;

class Flash extends ServiceProvider
{
    protected $alias  = 'flash';
    protected $shared = true;

    public function register()
    {
        return new PhalconSessionBag('flash');
    }
}
