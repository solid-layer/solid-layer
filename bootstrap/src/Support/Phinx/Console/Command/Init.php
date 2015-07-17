<?php

namespace Bootstrap\Support\Phinx\Console\Command;

class Init extends \Phinx\Console\Command\Init
{
    protected function configure()
    {
        parent::configure();

        $this->setName('phinx:init');
    }
}