<?php
namespace Components\Exceptions;

use Clarity\Exceptions\Handler as BaseHandler;
use Clarity\Exceptions\AccessNotAllowedException;

class CsrfHandler extends BaseHandler
{
    public function report()
    {
        parent::report();
    }

    public function render($exception)
    {
        if (!($exception instanceof AccessNotAllowedException)) {
            return;
        }

        # - errors coming from ACL or anything that throws from
        # AccessNotAllowedException class.
        #
        # - handle it by providing a page that there is no privilege
        # to access the website.
        #
        # - the code below die-dump your exception message,
        # you can point it to your views folder or log the message
        # internally.

        echo $exception->getMessage();
    }
}
