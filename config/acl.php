<?php

return [

    'default_action' => \Phalcon\Acl::DENY,

    'access' => [
        'guest' => [
            'Welcome::showSignature',
        ],
    ],

]; # - end of return
