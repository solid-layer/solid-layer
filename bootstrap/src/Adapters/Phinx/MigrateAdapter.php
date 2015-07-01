<?php

namespace Bootstrap\Adapters\Phinx;

class MigrateAdapter extends \Phinx\Console\Command\Migrate
{
    protected function configure()
    {
        parent::configure();

        $this->setName('phinx:migrate');
    }
}