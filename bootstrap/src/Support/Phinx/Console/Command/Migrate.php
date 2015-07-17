<?php

namespace Bootstrap\Support\Phinx\Console\Command;

class Migrate extends \Phinx\Console\Command\Migrate
{
    protected function configure()
    {
        parent::configure();

        $this->setName('phinx:migrate');
    }
}