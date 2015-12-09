<?php
namespace Components\Exceptions;

use Exception;
use ErrorException;
use Clarity\Exceptions\Handler as BaseHandler;

class Handler extends BaseHandler
{
    public function report()
    {
        parent::report();
    }

    public function render($exception)
    {
        # - you may also want to extract the error for other purpose
        # such as logging it to your slack notification or bugsnag

        // ... notifications | bugsnag | etc...


        # - the code below will print a symfony debugging ui

        parent::render($exception);


        # - the code below will be your custom error view

        // echo di()->get('view')->take('errors.whoops', [
        //     'exception' => $exception,
        // ]);
        // exit;
    }
}
