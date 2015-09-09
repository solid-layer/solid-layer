<?php

namespace Components\Exceptions;

use View;
use Bootstrap\Exceptions\Handler as BaseHandler;
use Phalcon\Mvc\Dispatcher as MvcDispatcher;

class Handler extends BaseHandler
{
    public function report()
    {
        # -----------------------------------------------------
        # To enable your own template, uncomment below code
        # -----------------------------------------------------

        // if ($this->getDebugMode() == false) {
        //     $this->setHandler([$this, 'whoopsy']);
        // }

        parent::report();
    }

    public function whoopsy()
    {
        echo View::take('errors.whoops');
        return;
    }
}