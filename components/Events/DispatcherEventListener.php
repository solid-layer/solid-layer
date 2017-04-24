<?php

namespace Components\Events;

use Phalcon\Mvc\Dispatcher\Exception;
use Clarity\Exceptions\ControllerNotFoundException;

class DispatcherEventListener
{
    /**
     * This function resolves the dispatcher parameters.
     *
     * @param \Phalcon\Mvc\Dispatcher $dispatcher
     * @return void
     */
    protected function classResolver($dispatcher)
    {
        $controller_name = $dispatcher->getControllerClass();

        $action_name = $dispatcher->getActiveMethod();

        try {
            $stacks = [];

            $reflection = new \ReflectionMethod($controller_name, $action_name);

            $params = $reflection->getParameters();

            foreach ($params as $param) {
                if ($param->getClass() === null) {
                    $stacks[] = $param->getDefaultValue();

                    continue;
                }

                $stacks[] = (new \ReflectionClass($param->getClass()->name))->newInstance();
            }

            $dispatcher->setParams($stacks);
        } catch (\Exception $e) {
            # an exception has occurred, maybe the class or action does not exist.
        }
    }

    /**
     * Event Handler beforeDispatchLoop.
     *
     * @param mixed $event
     * @param mixed $dispatcher
     * @return void
     */
    public function beforeDispatchLoop($event, $dispatcher)
    {
        $this->classResolver($dispatcher);
    }

    /**
     * Event Handler beforeException.
     *
     * @param mixed $event
     * @param mixed $dispatcher
     * @param mixed $exception
     * @return void
     */
    public function beforeException($event, $dispatcher, $exception)
    {
        if ($exception instanceof Exception) {
            throw new ControllerNotFoundException(
                $exception->getMessage()
            );
        }
    }
}
