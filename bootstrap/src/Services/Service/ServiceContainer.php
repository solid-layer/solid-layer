<?php

namespace Bootstrap\Services\Service;

use Bootstrap\Exceptions\ServiceAliasNotFoundException;

class ServiceContainer
{
    public function addServiceProvider(ServiceProvider $obj)
    {
        $obj->boot();

        di()->set(
            $obj->getAlias(), 
            $obj->callRegister(), 
            $obj->getShared()
        );

        return $this;
    }
}