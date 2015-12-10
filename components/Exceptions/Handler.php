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

    public function render($e)
    {
        if ($e instanceof AccessNotAllowedException) {
            (new CsrfHandler)->handle($e);
        }

        # - you may also want to extract the error for other purpose
        # such as logging it to your slack notification or bugsnag

        // ... notifications | bugsnag | etc...


        # - the code below will print a symfony debugging ui

        return parent::render($e);


        # - the code below will be your custom error view

        // echo di()->get('view')->take('errors.whoops', [
        //     'e' => $e,
        // ]);
        // exit;
    }
}
