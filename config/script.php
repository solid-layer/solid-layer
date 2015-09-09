<?php

return [

    'deploy' => [
        'ssh root@website.org',
        'cd /var/www/slayer/',
        'git pull origin master',
        'php slayer db:migrate',
        'composer update',
        'composer dumpautoload --optimize',
    ],

    'pull' => [
        'cd ' . BASE_PATH,
        'git pull origin master',
        'php slayer clear:cache',
        'php slayer clear:logs',
        'php slayer clear:session',
        'php slayer clear:views',
        'php slayer db:migrate',
        'composer update',
        'composer dumpautoload',
    ],

]; # - end of return