<?php

namespace Components\Console;

use Clarity\Console\Brood;

class Console extends Brood
{
    public function slash()
    {
        $this->command('You must create a (slash) function');
    }
}
