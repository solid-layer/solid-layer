<?php

return [

    'beanstalk' => [
        'class' => Clarity\Support\Queue\Beanstalkd\Beanstalkd::class,
        'config' => [
            'host' => 'localhost',
            'port' => '11300',
        ],
    ],

];
