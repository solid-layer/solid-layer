<?php

namespace Bootstrap\Adapters\Phinx;

class CreateAdapter extends \Phinx\Console\Command\Create
{
    protected function configure()
    {
        parent::configure();

        $this->setName('phinx:create');
    }
}