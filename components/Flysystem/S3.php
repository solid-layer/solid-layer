<?php
namespace Components\Flysystem;

use Aws\S3\S3Client;
use League\Flysystem\AwsS3v3\AwsS3Adapter;
use Clarity\Contracts\Flysystem\AdapterInterface;

class S3 implements AdapterInterface
{
    private $config;

    public function __construct($config)
    {
        $this->config = $config;
    }

    public function getAdapter()
    {
        return new AwsS3Adapter(
            new S3Client($this->config),
            $this->config['bucket']
        );
    }
}
