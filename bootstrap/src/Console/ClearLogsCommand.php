<?php

namespace Bootstrap\Console;

use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;

class ClearLogsCommand extends SlayerCommand
{
    use ClearTrait;

    protected $name = 'clear:logs';

    protected $description = 'Clear the storage/logs folder';
    
    public function slash()
    {
        $this->clear(slayer_config()->path->logsDir);
    }
}