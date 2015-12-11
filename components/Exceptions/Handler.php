<?php
namespace Components\Exceptions;

use Clarity\Exceptions\Handler as BaseHandler;
use Clarity\Exceptions\ControllerNotFoundException;
use Clarity\Exceptions\AccessNotAllowedException;

class Handler extends BaseHandler
{
    public function report()
    {
        parent::report();
    }

    public function render($e)
    {
        if ($e instanceof AccessNotAllowedException) {
            return (new CsrfHandler)->handle($e);
        }

        if ($e instanceof ControllerNotFoundException) {

            if ( config()->app->debug === 'false' ) {

                return (new PageNotFoundHandler)->handle($e);
            }
        }

        # - you may also want to extract the error for other purpose
        # such as logging it to your slack notification or bugsnag

        // ... notifications | bugsnag | etc...


        # - the code below will print a symfony debugging ui

        return parent::render($e);
    }
}
