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

    public function render($e, $status_code = null)
    {
        if (headers_sent()) {
            return;
        }

        if ($e instanceof AccessNotAllowedException) {
            return (new CsrfHandler)->handle($e);
        }

        if ($e instanceof ControllerNotFoundException && !headers_sent()) {
            if (config()->app->debug) {
                return parent::render($e, PageNotFoundHandler::STATUS_CODE);
            }

            return (new PageNotFoundHandler)->handle($e);
        }

        # you may also want to extract the error for other purpose
        # such as logging it to your slack bot notifier or using
        # bugsnag

        // ... notifications | bugsnag | etc...

        if (! config()->app->debug && is_cli() === false && !headers_sent()) {
            return (new FatalHandler)->handle($e);
        }

        if (!headers_sent()) {
            return parent::render($e);
        }
    }
}
