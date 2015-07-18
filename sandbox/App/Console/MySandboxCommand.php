<?php

namespace Sandbox\App\Console;

use Bootstrap\Console\SlayerCommand;

class MySandboxCommand extends SlayerCommand
{
    protected $name = 'sandbox:test';

    protected $description = 'This is just a sandbox command';

    public function slash()
    {
        
    }
}