<?php

use Clarity\Console\CLI;

return [

    'pull' => [
        'cd '.config('path.root'),
        'git pull origin master',
        'php brood clear:cache',
        'php brood clear:logs',
        'php brood clear:session',
        'php brood clear:views',
        'php brood db:migrate',
        'composer update',
        'composer dumpautoload',
    ],
    'deploy' => [
        CLI::ssh('root@domain.com', function () {
            return [
                'cd /var/www',
                'ls',
            ];
        }, $execute = false),
    ],

]; # end of return
