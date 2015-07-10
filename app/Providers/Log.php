<?php

namespace App\Providers;

use Bootstrap\Services\Service\ServiceProvider;
use Phalcon\Logger\Adapter\File as FileAdapter;

class Log extends ServiceProvider
{
    protected $_alias = 'log';

    protected $_shared = false;

    public function register()
    {
        $logger = new FileAdapter(config()->path->logsDir . 'error.log');

        # initialized error logging
        if ( di()->has('whoops') ) {
            di()->get('whoops')->pushHandler(function ($exception, $inspector, $run) use ($logger) {
                $logger->error('Message: ' . $exception->getMessage());
                $logger->error('Code: ' . $exception->getCode());
                $logger->error('File: ' . $exception->getFile());
                $logger->error('Line: ' . $exception->getLine());
                $logger->error('Trace: ' . json_encode($exception->getTrace()));
            });
        }

        return $logger;
    }
}