<?php
namespace Bootstrap\Providers;

use Phalcon\Filter as HttpFilter;

class Filter extends ServiceProvider
{
    protected $alias  = 'filter';
    protected $shared = false;

    public function register()
    {
        return new HttpFilter;
    }
}
