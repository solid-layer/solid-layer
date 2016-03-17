<?php

return [

    'local' => [
        'class'  => Components\Flysystem\Local::class,
        'config' => [
            'path' => BASE_PATH,
        ],
    ],


    # before using this, install the package first
    # composer require league/flysystem-aws-s3-v3

    // 's3' => [
    //     'class'  => Components\Flysystem\S3::class,
    //     'config' => [
    //         'credentials' => [
    //             'key'    => 'key here',
    //             'secret' => 'secret here'
    //         ],
    //         'region'  => 'us-east-1',
    //         'version' => 'latest',
    //         'bucket'  => 'your bucket',
    //     ],
    // ],


    # before using this, install the package first
    # composer require league/flysystem-copy

    // 'copy' => [
    //     'class' => Components\Flysystem\Copy::class,
    //     'config' => [
    //         'consumer_key' => '',
    //         'consumer_secret' => '',
    //         'access_token' => '',
    //         'token_secret' => '',
    //     ],
    // ],

];
