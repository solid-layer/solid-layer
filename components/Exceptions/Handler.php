<?php
namespace Components\Exceptions;

use Exception;
use Clarity\Exceptions\Handler as BaseHandler;

class Handler extends BaseHandler
{
    public function report()
    {
        parent::report();
    }

    public function render($exception)
    {
        if (!($exception instanceof Exception)) {
            return;
        }


        # - you may also want to extract the error for other purpose
        # such as logging it to your slack notification or bugsnag

        // ... notifications | bugsnag | etc...


        # - the code below will print a symfony debugging ui

        parent::render($exception);


        # - the code below will be your custom error view

        // echo View::take('errors.whoops', [
        //     'exception' => $exception,
        // ]);
        // exit;
    }
}
