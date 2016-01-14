<?php

return [

    'beanstalk' => [
        'class' => Phalcon\Queue\Beanstalk::class,
        'config' => [
            'host' => 'localhost',
            'port' => '11300',
        ],
    ],

];
