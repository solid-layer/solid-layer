<?php

return [

    'default_action' => \Phalcon\Acl::DENY,

    'allowed' => [

        'guest' => [
            'Welcome::showSignature',
        ],

    ],

    'denied' => [],

]; # - end of return
