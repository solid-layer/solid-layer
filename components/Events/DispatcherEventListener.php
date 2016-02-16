<?php
namespace Components\Events;

use Phalcon\Mvc\Dispatcher\Exception;
use Clarity\Exceptions\ControllerNotFoundException;

class DispatcherEventListener
{
    public function beforeException($event, $dispatcher, $exception)
    {
        if ( $exception instanceof Exception ) {

            throw new ControllerNotFoundException(
                $exception->getMessage()
            );
        }
    }
}
