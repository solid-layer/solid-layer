<?php

namespace Bootstrap\Console\Make;

use Bootstrap\Console\SlayerCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;

class ControllerCommand extends SlayerCommand
{
    protected $name = 'make:controller';

    protected $description = 'Generate a controller';

    public function slash()
    {
        $arg_name = ucfirst($this->input->getArgument('name'));

        # - get the main stub file
        $stub = file_get_contents(__DIR__ . '/stubs/makeController.stub');
        $stub = str_replace('{controllerName}', $arg_name, $stub);


        # - to use emptify
        if ($this->input->getOption('emptify') == true) {
            $stub = str_replace('{controllerFunctions}', '', $stub);
        }

        # - else empty
        else {
            $_controllerFunctions = file_get_contents(__DIR__ . '/stubs/_controllerFunctions.stub');

            $stub = str_replace(
                '{controllerFunctions}',
                $_controllerFunctions,
                $stub
            );

            $stub = str_replace(
                '{controllerName}',
                strtolower($arg_name),
                $stub
            );
        }

        # create the file name
        $file_name = $arg_name . 'Controller.php';
        chdir(config()->path->controllersDir);
        $this->comment('Crafting Controller...');


        if ( file_exists($file_name) ) {
            $this->error('   Controller already exists!');
        } else {
            file_put_contents($file_name, $stub);

            $this->info('   Controller has been created!');
        }
    }

    protected function arguments()
    {
        return [
            ['name', InputArgument::REQUIRED, 'Controller name to be used'],
        ];
    }

    protected function options()
    {
        return [
            [
                'emptify',
                null,
                InputOption::VALUE_OPTIONAL,
                'Remove all pre-defined functions',
                false,
            ],
        ];
    }
}