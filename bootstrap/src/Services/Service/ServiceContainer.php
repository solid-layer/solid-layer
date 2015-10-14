<?php

namespace Bootstrap\Services\Service;

use Bootstrap\Exceptions\ServiceAliasNotFoundException;

class ServiceContainer
{
    private $providers;

    public function addServiceProvider(ServiceProvider $provider)
    {
        $this->providers[] = $provider;

        return $this;
    }

    public function boot()
    {
        foreach ($this->providers as $provider) {
            di()->set(
                $provider->getAlias(),
                $provider->callRegister(),
                $provider->getShared()
            );
        }

        foreach ($this->providers as $provider) {
            $provider->boot();
        }
    }
}