<?php

namespace Bootstrap\Support\Phinx\Console\Command;

class Create extends \Phinx\Console\Command\Create
{
    protected function configure()
    {
        parent::configure();

        $this->setName('phinx:create');
    }
}