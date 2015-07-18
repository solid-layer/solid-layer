<?php

namespace App\Providers\Slayer;

use Bootstrap\Services\Service\ServiceProvider;
use Phalcon\Session\Bag as PhalconSessionBag;

class Flash extends ServiceProvider
{
    protected $_alias = 'flash';

    protected $_shared = true;

    public function register()
    {
        return new PhalconSessionBag('flash');
    }
}