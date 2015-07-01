<?php

namespace Bootstrap\Adapters\Phinx;

class InitAdapter extends \Phinx\Console\Command\Init
{
    protected function configure()
    {
        parent::configure();

        $this->setName('phinx:init');
    }
}