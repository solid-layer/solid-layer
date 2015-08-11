<?php

namespace Bootstrap\Console;

use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;

class MakeModelCommand extends SlayerCommand
{
    protected $name = 'make:model';

    protected $description = 'Create a new model';

    public function slash()
    {
        $name = ucfirst($this->input->getArgument('model'));
        $stub = file_get_contents(__DIR__ . '/stubs/makeModel.stub');
        $stub = str_replace('{modelName}', $name, $stub);

        $source_name = $this->input->getArgument('table');
        $stub = str_replace('{table}', $source_name, $stub);

        $file_name = $name . '.php';
        chdir(config()->path->modelsDir);
        $this->comment('Crafting Model...');

        if (file_exists($file_name)) {
            $this->error('   Model already exists!');
        } else {
            file_put_contents($file_name, $stub);
            $this->info('   Model has been created!');
        }
    }

    protected function arguments()
    {
        return [
            [
                'model',
                InputArgument::REQUIRED,
                'Model name to be use e.g(User)',
            ],
            [
                'table',
                InputArgument::REQUIRED,
                'Database table name e.g(users)',
            ],
        ];
    }
}