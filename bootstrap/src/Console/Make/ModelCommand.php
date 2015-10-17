<?php
namespace Bootstrap\Console\Make;

use Bootstrap\Console\SlayerCommand;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;

class ModelCommand extends SlayerCommand
{
    protected $name = 'make:model';

    protected $description = 'Generate a database model';

    public function slash()
    {
        $arg_name = ucfirst($this->input->getArgument('model'));


        $stub = file_get_contents(__DIR__ . '/stubs/makeModel.stub');
        $stub = str_replace('{modelName}', $arg_name, $stub);


        $source_name = $this->input->getOption('table');
        if (strlen($source_name) == 0) {
            $source_name = strtolower($arg_name);
        }

        $stub = str_replace('{table}', $source_name, $stub);


        $file_name = $arg_name . '.php';
        chdir(config()->path->modelsDir);
        $this->comment('Crafting Model...');


        if ( file_exists($file_name) ) {
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
        ];
    }

    protected function options()
    {
        return [
            [
                'table',
                null,
                InputOption::VALUE_OPTIONAL,
                'The table to use',
                false,
            ],
        ];
    }
}