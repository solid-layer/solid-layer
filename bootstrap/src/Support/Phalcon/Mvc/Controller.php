<?php
namespace Bootstrap\Support\Phalcon\Mvc;

use League\Tactician\CommandBus;
use Components\Command\Kernel as Kernel;

class Controller extends \Phalcon\Mvc\Controller
{
    public function middleware($alias)
    {
        # - instantiate the middleware kernel

        $kernel = new Kernel;
        $kernel->initialize();


        # - get the class in the middleware kernel

        $class = $kernel->getClass($alias);
        $instance = new $class;


        $command_bus = new CommandBus([$instance]);
        $command_bus->handle( $this );
    }
}
