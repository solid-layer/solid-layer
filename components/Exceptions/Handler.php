<?php
namespace Components\Exceptions;

use Exception;
use Clarity\Exceptions\Handler as BaseHandler;
use Clarity\Exceptions\AccessNotAllowedException;

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

        try {
            if ( $exception instanceof Exception ) {
                throw $exception;
            }
        }

        catch (AccessNotAllowedException $e) {
            # - errors coming from ACL or anything that throws from
            # this class.
            # - handle it by providing a page that there is no privilege
            # to access the website.

            dd($e->getMessage());
        }

        catch(Exception $e) {
            parent::render($e);
        }


        # - the code below will be your custom error view

        // echo View::take('errors.whoops', [
        //     'exception' => $exception,
        // ]);
        // exit;
    }
}
