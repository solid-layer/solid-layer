<?php

return [

    'deploy' => [
        'ssh root@website.org',
        'cd /var/www/phalconslayer/slayer/',
        'git pull origin master',
        'php brood db:migrate',
        'composer update',
        'composer dumpautoload --optimize',
    ],

    'pull' => [
        'cd ' . BASE_PATH,
        'git pull origin master',
        'php brood clear:cache',
        'php brood clear:logs',
        'php brood clear:session',
        'php brood clear:views',
        'php brood db:migrate',
        'composer update',
        'composer dumpautoload',
    ],

]; # - end of return
