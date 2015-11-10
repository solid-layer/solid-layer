<?php
namespace Bootstrap\Providers;

use Monolog\Logger;
use Monolog\Handler\StreamHandler;

class Log extends ServiceProvider
{
    protected $alias  = 'log';
    protected $shared = false;

    public function register()
    {
        $logger = new Logger('slayer');

        $logger->pushHandler(
            new StreamHandler(
                config()->path->logs . 'slayer.log',
                Logger::DEBUG
            )
        );

        return $logger;
    }
}
