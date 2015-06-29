<?php

return [

    // add your console commands here ...

    /*
    * --------------------------------------------------------
    * PhalconSlayer Registered Commands
    * ---------------------------------------------------------
    * Pre-registed commands
    */
    Bootstrap\Console\MakeConsoleCommand::class,
    Bootstrap\Console\MakeControllerCommand::class,
    Bootstrap\Console\ServeCommand::class,
    Bootstrap\Console\Phinx\Create::class,
    Bootstrap\Console\Phinx\Init::class,
    Bootstrap\Console\Phinx\Migrate::class,
    Bootstrap\Console\Phinx\Rollback::class,
    Bootstrap\Console\Phinx\Status::class,
    Bootstrap\Console\Phinx\Test::class,
];