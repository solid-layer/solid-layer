<?php

namespace Components\Flysystem;

use League\Flysystem\Adapter\Local as LeagueFlysystemAdapterLocal;

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
        return new LeagueFlysystemAdapterLocal($this->config['path'], 0);
    }
}