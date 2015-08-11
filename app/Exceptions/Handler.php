<?php

namespace App\Exceptions;

use View;
use Bootstrap\Exceptions\Handler as BaseHandler;

class Handler extends BaseHandler
{
    public function report()
    {
        if ($this->getDebugMode() == false) {
            $this->setHandler([$this, 'whoopsy']);
        }

        parent::report();
    }

    public function whoopsy()
    {
        echo View::take('errors.whoops'); return;
    }
}