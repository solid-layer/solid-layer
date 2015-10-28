<?php
namespace Bootstrap\Console\App;

use Bootstrap\Console\SlayerCommand;
use Bootstrap\Console\CLI;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;

class ControllerCommand extends SlayerCommand
{
    protected $name        = 'app:controller';
    protected $description = 'Generate a controller';

    public function slash()
    {
        $arg_name = ucfirst($this->input->getArgument('name'));

        # - get the main stub file
        $stub = file_get_contents(__DIR__ . '/stubs/makeController.stub');
        $stub = str_replace('{controllerName}', $arg_name, $stub);


        # - to use emptify
        if ($this->input->getOption('emptify') === true) {
            $stub = str_replace('{controllerFunctions}', '', $stub);
        }

        # - else empty
        else {
            $controller_functions = file_get_contents(__DIR__ . '/stubs/_controllerFunctions.stub');

            $stub = str_replace(
                '{controllerFunctions}',
                $controller_functions,
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

        $module = $this->input->getArgument('module');
        $has_dir = is_dir(config()->path->app . $module);

        if ( $has_dir === false ) {
            $this->error('Module not found `' . $module . '`');

            return;
        }

        $controllers_dir = config()->path->app . $module . '/Controllers';

        if ( is_dir($controllers_dir) === false ) {
            $this->error('Controllers folder not found from your module: `' . $module . '`');

            return;
        }

        chdir( $controllers_dir );
        $stub = str_replace('{namespace}',  'App\\' . $module . '\\Controllers', $stub);

        $this->comment('Crafting Controller...');

        if ( file_exists($file_name) ) {
            $this->error('   Controller already exists!');

            return;
        }

        file_put_contents($file_name, $stub);
        $this->info('   Controller has been created!');

        chdir(config()->path->root);
        CLI::bash([
            'composer dumpautoload',
        ]);
    }

    protected function arguments()
    {
        $arguments = [
            ['name', InputArgument::REQUIRED, 'Controller name to be used'],
            ['module', InputArgument::REQUIRED, 'The targetted module'],
        ];

        return $arguments;
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