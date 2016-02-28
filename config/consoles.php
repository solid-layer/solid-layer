<?php

return [


    /*
    +----------------------------------------------------------------+
    |\ PhalconSlayer Registered Commands                            /|
    +----------------------------------------------------------------+
    |
    | Register your slayer commands to lists up upon running
    | `php brood` to your terminal
    |
    */

    Components\Console\QueueWorker::class,
    Clarity\Console\App\ControllerCommand::class,
    Clarity\Console\App\ModuleCommand::class,
    Clarity\Console\App\RouteCommand::class,
    Clarity\Console\Clear\AllCommand::class,
    Clarity\Console\Clear\CacheCommand::class,
    Clarity\Console\Clear\LogsCommand::class,
    Clarity\Console\Clear\SessionCommand::class,
    Clarity\Console\Clear\ViewsCommand::class,
    Clarity\Console\DB\SeedFactory::class,
    Clarity\Console\Mail\InlinerCommand::class,
    Clarity\Console\Make\CollectionCommand::class,
    Clarity\Console\Make\ConsoleCommand::class,
    Clarity\Console\Make\ModelCommand::class,
    Clarity\Console\Script\RunCommand::class,
    Clarity\Console\Server\OptimizeCommand::class,
    Clarity\Console\Server\ServeCommand::class,
    Clarity\Console\Server\EnvCommand::class,
    Clarity\Console\Vendor\PublishCommand::class,
    Clarity\Support\Phinx\Console\Command\Create::class,
    Clarity\Support\Phinx\Console\Command\Migrate::class,
    Clarity\Support\Phinx\Console\Command\Rollback::class,
    Clarity\Support\Phinx\Console\Command\SeedCreate::class,
    Clarity\Support\Phinx\Console\Command\SeedRun::class,
    Clarity\Support\Phinx\Console\Command\Status::class,

    # - add your console commands below ...

]; # - end of return
