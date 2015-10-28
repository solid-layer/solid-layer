<?php
namespace Bootstrap\Console\DB;

use Bootstrap\Support\DB\Factory;
use Bootstrap\Console\SlayerCommand;

class SeedCommand extends SlayerCommand
{
    protected $name = 'db:seed';

    protected $description = 'Database seed based on the factories';

    public function slash()
    {
        $files = folder_files(config()->path->database . 'factories');

        $factory = new Factory;

        if ( !empty($files) ) {
            foreach ($files as $file) {
                $this->comment('Processing ' . basename($file) . '...');
                require $file;
                $this->info('Done.' . "\n");
            }
        }
    }
}
