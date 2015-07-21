<?php

namespace App\Console;

use Bootstrap\Console\SlayerCommand;

class BaseCommand extends SlayerCommand
{
    public function slash()
    {
        $this->command('You must create a (slash) function');
    }
}