<?php

namespace Bootstrap\Console\Clear;

use Bootstrap\Console\SlayerCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;

class SessionCommand extends SlayerCommand
{
    use ClearTrait;

    protected $name = 'clear:session';

    protected $description = 'Clear the storage/session folder';

    public function slash()
    {
        $this->clear(config()->path->session);
    }
}