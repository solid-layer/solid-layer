<?php

namespace Bootstrap\Console\Phinx;

class Migrate extends \Phinx\Console\Command\Migrate
{
    protected function configure()
    {
        parent::configure();

        $this->setName('phinx:migrate');
    }
}