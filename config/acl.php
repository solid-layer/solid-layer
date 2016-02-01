<?php

return [

    /*
    +----------------------------------------------------------------+
    |\ Default Action                                               /|
    +----------------------------------------------------------------+
    |
    | This will be the main process, on which will be the default
    | action to use, by default we're denying all the access.
    |
    */

    'default_action' => \Phalcon\Acl::DENY,


    /*
    +----------------------------------------------------------------+
    |\ Configuration                                                /|
    +----------------------------------------------------------------+
    |
    | By using the index 'allowed_lists' you are saying that these
    | lists are ALLOWED to access the action.
    |
    | By using the index 'denied_lists' you are doing the reverse
    | process of 'access_lists'
    |
    */

    'allowed_lists' => [

        # you can do multiple role by adding comma to handle shared
        # resources
        #
        # Something Like:
        #           'guest,user,moderator,administrator' => array(...)

        'guest' => [

            # you can apply multiple actions by adding a comma
            #
            # Something Like:
            #       'Welcome|index,showSignature,showDashboard'

            'Welcome|showSignature,trySampleForms',
        ],
    ],

]; # - end of return
