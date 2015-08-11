<?php

namespace Bootstrap\Exceptions;

use Exception;
use Symfony\Component\Debug\ExceptionHandler;
use Monolog\ErrorHandler;

class Handler extends Exception
{
    private $handler;

    private $function_name = 'handle';

    public function __construct($message = null, $code = null, $previous = null)
    {
        parent::__construct($message, $code, $previous);

        $this->initialize();
    }


    /**
     * Initialize the process of the symfony handlers
     */
    protected function initialize()
    {
        $this->handler = new ExceptionHandler($this->getDebugMode());

        ErrorHandler::register(di()->get('log'));

        return $this;
    }

    /**
     * Get the default symfony whoops error
     *
     */
    protected function report()
    {
        $prev = set_exception_handler([
            $this->handler,
            $this->function_name
        ]);

        return $this->handler;
    }

    /**
     * Get the default handler
     */
    protected function getHandler()
    {
        return $this->handler;
    }

    /**
     * Override the default symfony handler
     */
    protected function setHandler(array $arg)
    {
        $this->handler       = $arg[ 0 ];
        $this->function_name = $arg[ 1 ];

        return $this;
    }

    /**
     * Get the environment debug mode value
     */
    protected function getDebugMode()
    {
        $prop = false;

        if ($debug = config()->app->debug == 'true' || $debug === true) {

            $prop = true;
        }

        return $prop;
    }
}