<?php
namespace Bootstrap\Support;

use Bootstrap\Exceptions\BadMethodCallException;

trait WithMagicMethodTrait
{
    /**
     * Magic methods that uses 'withVarName'
     *
     * @return string
     */
    public function __call($method, $parameters)
    {
        if (starts_with($method, 'with')) {
            return $this->with(snake_case(substr($method, 4)),
                $parameters[ 0 ]);
        }

        throw new BadMethodCallException("Method [$method] does not exist on view.");
    }
}