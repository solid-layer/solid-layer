<?php

return [

    // add your console commands here ...

    /*
    |--------------------------------------------------------
    | PhalconSlayer Registered Commands
    |---------------------------------------------------------
    | Pre-registed commands
    */
    Bootstrap\Console\ClearCacheCommand::class,
    Bootstrap\Console\ClearSessionCommand::class,
    Bootstrap\Console\ClearViewsCommand::class,
    Bootstrap\Console\MakeRouteCommand::class,
    Bootstrap\Console\MakeConsoleCommand::class,
    Bootstrap\Console\MakeControllerCommand::class,
    Bootstrap\Console\MakeModelCommand::class,
    Bootstrap\Console\MakeCollectionCommand::class,
    Bootstrap\Console\ServeCommand::class,
    Bootstrap\Support\Phinx\Create::class,
    Bootstrap\Support\Phinx\Migrate::class,
    Bootstrap\Support\Phinx\Rollback::class,
    Bootstrap\Support\Phinx\Status::class,
    Bootstrap\Support\Phinx\Test::class,
    // Bootstrap\Support\Phinx\InitAdapter::class,
];