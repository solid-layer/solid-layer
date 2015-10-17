<?php
namespace Bootstrap\Console\Clear;

use Bootstrap\Console\SlayerCommand;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;

class CacheCommand extends SlayerCommand
{
    use ClearTrait;

    protected $name = 'clear:cache';

    protected $description = 'Clear the storage/cache folder';

    public function slash()
    {
        $this->clear(config()->path->cache);
    }
}