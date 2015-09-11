<?php

namespace Bootstrap\App\Console\App;

use Bootstrap\App\Console\SlayerCommand;

class MakeCommand extends SlayerCommand
{
    protected $name = 'app:make';

    protected $description = 'Generate a new module';

    public function slash()
    {
    }
}