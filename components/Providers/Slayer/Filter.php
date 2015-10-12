<?php

namespace Components\Providers\Slayer;

use Bootstrap\Services\Service\ServiceProvider;
use Phalcon\Filter as HttpFilter;

class Filter extends ServiceProvider
{
    protected $_alias = 'filter';

    protected $_shared = false;

    public function register()
    {
        return new HttpFilter;
    }
}