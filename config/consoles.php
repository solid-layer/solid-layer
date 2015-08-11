<?php

return [

    # ---- add your console commands here ...


    # -----------------------------------------------------------
    # PhalconSlayer Registered Commands
    # -----------------------------------------------------------
    # ---- Pre-registed commands
    Bootstrap\Console\MailInlinerCommand::class,
    Bootstrap\Console\VendorPublishCommand::class,
    Bootstrap\Console\ClearCacheCommand::class,
    Bootstrap\Console\ClearSessionCommand::class,
    Bootstrap\Console\ClearViewsCommand::class,
    Bootstrap\Console\MakeRouteCommand::class,
    Bootstrap\Console\MakeConsoleCommand::class,
    Bootstrap\Console\MakeControllerCommand::class,
    Bootstrap\Console\MakeModelCommand::class,
    Bootstrap\Console\MakeCollectionCommand::class,
    Bootstrap\Console\ServeCommand::class,
    Bootstrap\Support\Phinx\Console\Command\Create::class,
    Bootstrap\Support\Phinx\Console\Command\Migrate::class,
    Bootstrap\Support\Phinx\Console\Command\Rollback::class,
    Bootstrap\Support\Phinx\Console\Command\Status::class,
    Bootstrap\Support\Phinx\Console\Command\Test::class,
    App\Console\AwsTestConsoleCommand::class,
]; # - end of return