<?php

namespace Components\Flysystem;

use Aws\S3\S3Client;
use League\Flysystem\AwsS3v3\AwsS3Adapter;

class AwsS3 implements FlysystemAdapterInterface
{
    private $config;

    public function __construct($config)
    {
        $this->config = $config;
    }

    public function client()
    {
        return new S3Client($this->config);
    }

    public function adapter()
    {
        return new AwsS3Adapter($this->client(), $this->config['bucket']);
    }
}