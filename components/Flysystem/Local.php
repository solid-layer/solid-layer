<?php

namespace Components\Flysystem;

use League\Flysystem\Adapter\Local as FlyLocal;
use Clarity\Contracts\Flysystem\AdapterInterface;

class Local implements AdapterInterface
{
    private $config;

    public function __construct($config)
    {
        $this->config = $config;
    }

    public function getAdapter()
    {
        return new FlyLocal($this->config['path'], 0);
    }
}
