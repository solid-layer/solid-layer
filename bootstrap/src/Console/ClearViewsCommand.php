<?php

namespace Bootstrap\Console;

use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;

class ClearViewsCommand extends SlayerCommand
{
    use ClearTrait;

    protected $name = 'clear:views';

    protected $description = 'Clear the storage/views folder';
    
    public function slash()
    {
        $this->clear(slayer_config()->path->storageViewDir);
    }
}