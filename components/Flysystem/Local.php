<?php
namespace Components\Flysystem;

use League\Flysystem\Adapter\Local as FlyLocal;
use Bootstrap\Contracts\Flysystem\FlysystemAdapterInterface;

class Local implements FlysystemAdapterInterface
{
    private $config;

    public function __construct($config)
    {
        $this->config = $config;
    }

    public function client()
    {
    }

    public function adapter()
    {
        return new FlyLocal($this->config['path'], 0);
    }
}
