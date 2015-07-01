<?php

return [

    // add your console commands here ...

    /*
    * --------------------------------------------------------
    * PhalconSlayer Registered Commands
    * ---------------------------------------------------------
    * Pre-registed commands
    */
    Bootstrap\Console\MakeRouteCommand::class,
    Bootstrap\Console\MakeConsoleCommand::class,
    Bootstrap\Console\MakeControllerCommand::class,
    Bootstrap\Console\ServeCommand::class,
    Bootstrap\Adapters\Phinx\CreateAdapter::class,
    Bootstrap\Adapters\Phinx\MigrateAdapter::class,
    Bootstrap\Adapters\Phinx\RollbackAdapter::class,
    Bootstrap\Adapters\Phinx\StatusAdapter::class,
    Bootstrap\Adapters\Phinx\TestAdapter::class,
    // Bootstrap\Adapters\Phinx\InitAdapter::class,
];