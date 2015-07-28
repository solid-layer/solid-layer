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
        $logger = new Logger('system_log');
        $logger->pushHandler(new StreamHandler(config()->path->logsDir . 'error.log', Logger::DEBUG));

        if (di()->has('whoops')) {
            di()->get('whoops')->pushHandler(
                function ($exception, $inspector, $run) use ($logger) {
                    $logger->addError($exception->getMessage());
                }
            );
        }

        return $logger;
    }
}