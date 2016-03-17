<?php
namespace Components\Flysystem;

use Barracuda\Copy\API;
use League\Flysystem\Filesystem;
use League\Flysystem\Copy\CopyAdapter;
use Clarity\Contracts\Flysystem\AdapterInterface;

class Copy implements AdapterInterface
{
    private $config;

    public function __construct($config)
    {
        $this->config = $config;
    }

    public function getAdapter()
    {
        $client = new API(
            $this->config['consumer_key'],
            $this->config['consumer_secret'],
            $this->config['access_token'],
            $this->config['token_secret']
        );

        return Filesystem(
            new CopyAdapter($client, 'optional/path/prefix')
        );
    }
}
