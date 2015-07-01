<?php

namespace Bootstrap\Console;

use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;

class MakeCollectionCommand extends SlayerCommand
{
    protected $name = 'make:collection';

    protected $description = 'Create a new collection';
    
    public function slash()
    {
        $name = ucfirst($this->input->getArgument('model'));
        $stub = file_get_contents(__DIR__ . '/stubs/makeCollection.stub');
        $stub = str_replace('{collectionName}', $name, $stub);

        $source_name = $this->input->getArgument('collection');
        $stub = str_replace('{collection}', $source_name, $stub);

        $file_name = $name . '.php';
        chdir(slayer_config()->path->collectionsDir);
        $this->comment('Crafting Collection...');

        if ( file_exists($file_name) ) {
            $this->error('   Collection already exists!');
        } else {
            file_put_contents($file_name, $stub);
            $this->info('   Collection has been created!');
        }
    }

    protected function arguments()
    {
        return [
            ['model', InputArgument::REQUIRED, 'Model name to be use e.g(Robot)'],
            ['collection', InputArgument::REQUIRED, 'ODM collection name e.g(robots)'],
        ];
    }
}