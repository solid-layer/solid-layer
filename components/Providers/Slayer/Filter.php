<?php
namespace Components\Providers\Slayer;

use Phalcon\Filter as HttpFilter;
use Bootstrap\Services\Service\ServiceProvider;

class Filter extends ServiceProvider
{
    protected $_alias = 'filter';

    protected $_shared = false;

    public function register()
    {
        return new HttpFilter;
    }
}