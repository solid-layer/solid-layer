<?php

return [

    # ----------------------------------------------------------------
    # PhalconSlayer Registered Commands
    # ----------------------------------------------------------------
    # - Pre-registered commands

    Bootstrap\Console\App\ControllerCommand::class,
    Bootstrap\Console\App\RouteCommand::class,
    Bootstrap\Console\Clear\AllCommand::class,
    Bootstrap\Console\Clear\CacheCommand::class,
    Bootstrap\Console\Clear\SessionCommand::class,
    Bootstrap\Console\Clear\ViewsCommand::class,
    Bootstrap\Console\Clear\LogsCommand::class,
    Bootstrap\Console\Make\ConsoleCommand::class,
    Bootstrap\Console\Make\ModelCommand::class,
    Bootstrap\Console\Make\CollectionCommand::class,
    Bootstrap\Console\Mail\InlinerCommand::class,
    Bootstrap\Console\Server\ServeCommand::class,
    Bootstrap\Console\Server\OptimizeCommand::class,
    Bootstrap\Console\Vendor\PublishCommand::class,
    Bootstrap\Console\Script\RunCommand::class,
    Bootstrap\Support\Phinx\Console\Command\Create::class,
    Bootstrap\Support\Phinx\Console\Command\Migrate::class,
    Bootstrap\Support\Phinx\Console\Command\Rollback::class,
    Bootstrap\Support\Phinx\Console\Command\Status::class,

    # - add your console commands below ...

]; # - end of return