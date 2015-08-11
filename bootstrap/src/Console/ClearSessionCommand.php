<?php

namespace Bootstrap\Console;

use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;

class ClearSessionCommand extends SlayerCommand
{
    use ClearTrait;

    protected $name = 'clear:session';

    protected $description = 'Clear the storage/session folder';

    public function slash()
    {
        $this->clear(config()->path->sessionDir);
    }
}