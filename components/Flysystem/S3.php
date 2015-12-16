<?php
namespace Components\Flysystem;

use Aws\S3\S3Client;
use League\Flysystem\AwsS3v3\AwsS3Adapter;
use Clarity\Contracts\Flysystem\AdapterInterface;
use Clarity\Contracts\Flysystem\ClientInterface;

class S3 implements AdapterInterface, ClientInterface
{
    private $config;

    public function __construct($config)
    {
        $this->config = $config;
    }

    public function getClient()
    {
        return new S3Client($this->config);
    }

    public function getAdapter()
    {
        return new AwsS3Adapter($this->getClient(), $this->config['bucket']);
    }
}
