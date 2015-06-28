<?php

namespace Bootstrap\Console;

use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;

class MakeControllerCommand extends SlayerCommand
{
    protected $name = 'make:controller';

    protected $description = 'Generate a new controller';

    public function fire()
    {
        $arg_name = ucfirst($this->input->getArgument('name'));

        $stub = file_get_contents(__DIR__ . '/stubs/makeController.stub');
        $stub = str_replace('{controllerName}', $arg_name, $stub);

        if ( $this->input->getOption('emptify') ) {
            $_controllerFunctions = file_get_contents(__DIR__ . '/stubs/_controllerFunctions.stub');
            $stub = str_replace('{controllerFunctions}', $_controllerFunctions, $stub);
        } else {
            $stub = str_replace('{controllerFunctions}', '', $stub);
        }

        $file_name = $arg_name . 'Controller.php';
        chdir(slayer_config()->application->controllersDir);
        $this->comment('Creating Controller...');

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
            ['emptify', null, InputOption::VALUE_OPTIONAL, 'Remove all pre-defined functions', false],
        ];
    }
}