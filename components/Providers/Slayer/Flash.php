<?php
namespace Components\Providers\Slayer;

use Phalcon\Session\Bag as PhalconSessionBag;
use Bootstrap\Services\Service\ServiceProvider;

class Flash extends ServiceProvider
{
    protected $_alias = 'flash';

    protected $_shared = true;

    public function register()
    {
        return new PhalconSessionBag('flash');
    }
}