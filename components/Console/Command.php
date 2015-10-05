<?php

namespace Components\Console;

use Bootstrap\Console\SlayerCommand;

class Command extends SlayerCommand
{
    public function slash()
    {
        $this->command('You must create a (slash) function');
    }
}