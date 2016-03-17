<?php
namespace Components\Events;

class ApplicationEventListener
{
    public function boot()
    {
        # Executed when the application handles its first request
    }

    public function beforeStartModule()
    {
        # Before initialize a module, only when modules are registered
    }

    public function afterStartModule()
    {
        # After initialize a module, only when modules are registered
    }

    public function beforeHandleRequest()
    {
        # Before execute the dispatch loop
    }

    public function afterHandleRequest()
    {
        # After execute the dispatch loop
    }
}
