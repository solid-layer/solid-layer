<?php

return [

    'local' => [
        'class'  => Components\Flysystem\Local::class,
        'config' => [
            'path' => public_path(),
        ],
    ],

    // 's3' => [
    //     'class'  => Components\Flysystem\AwsS3::class,
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

];