<?php

namespace Bootstrap\Console;

use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;

class ClearCacheCommand extends SlayerCommand
{
    use ClearTrait;

    protected $name = 'clear:cache';

    protected $description = 'Clear the storage/cache folder';

    public function slash()
    {
        $this->clear(config()->path->cacheDir);
    }
}