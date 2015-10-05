<?php

namespace Bootstrap\Console\Clear;

use Bootstrap\Console\SlayerCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;

class ViewsCommand extends SlayerCommand
{
    use ClearTrait;

    protected $name = 'clear:views';

    protected $description = 'Clear the storage/views folder';

    public function slash()
    {
        $this->clear(config()->path->storage_views);
    }
}