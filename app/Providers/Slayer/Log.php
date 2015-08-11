<?php

namespace App\Providers\Slayer;

use Bootstrap\Services\Service\ServiceProvider;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;

class Log extends ServiceProvider
{
    protected $_alias = 'log';

    protected $_shared = false;

    public function register()
    {
        $logger = new Logger('slayer');
        $logger->pushHandler(
            new StreamHandler(
                config()->path->logsDir . 'slayer.log',
                Logger::DEBUG
            )
        );

        return $logger;
    }
}