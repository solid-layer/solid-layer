<?php

namespace Acme\Acme\App\Console;

use Bootstrap\Console\SlayerCommand;

class AcmeConsoleCommand extends SlayerCommand
{
    protected $name = 'acme:test';

    protected $description = 'ACME command line tests';

    public function slash()
    {

    }
}