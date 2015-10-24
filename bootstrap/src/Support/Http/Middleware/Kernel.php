<?php
namespace Bootstrap\Support\Http\Middleware;

use InvalidArgumentException;

class Kernel
{
    public function getClass($alias)
    {
        if ( ! isset($this->middlewares[$alias]) ) {
            throw new InvalidArgumentException(
                "Middleware based on alias [$alias] not found."
            );
        }

        return $this->middlewares[$alias];
    }

    public function getClasses()
    {
        return $this->middlewares;
    }
}