<?php

namespace Bootstrap\Services\Service;

use Bootstrap\Exceptions\ServiceAliasNotFoundException;

/**
* @author Daison Carino <daison12006013 [at] gmail [dot] com>
*/
class ServiceProvider
{
    public function dispatch(ServiceContainer $obj)
    {
        if (! $obj->hasAlias()) {
            throw new ServiceAliasNotFoundException(
                'protected $_alias not found on service "' . get_class($obj) . '"'
            );
        }

        $obj->afterBoot();

        di()
        ->set(
            $obj->getAlias(), 
            $obj->getBoot(), 
            $obj->getShared()
        );

        $obj->beforeBoot();

        return $this;
    }
}