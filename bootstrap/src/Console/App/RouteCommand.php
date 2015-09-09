<?php

namespace Bootstrap\Console\App;

use Bootstrap\Console\SlayerCommand;
use Bootstrap\Console\CLI;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;

class RouteCommand extends SlayerCommand
{
    protected $name = 'app:route-group';

    protected $description = 'Create a new route group';

    public function slash()
    {
        $arg_name = ucfirst($this->input->getArgument('name'));

        $stub = file_get_contents(__DIR__ . '/stubs/makeRoute.stub');
        $stub = str_replace('{routeName}', $arg_name, $stub);
        $stub = str_replace('{prefixRouteName}', strtolower($arg_name), $stub);

        $file_name = $arg_name . 'Routes.php';

        $module = $this->input->getArgument('module');
        $hasDir = is_dir(config()->path->app . $module);

        if ( $hasDir == false ) {
            $this->error('Module not found `' . $module . '`');

            return;
        }

        $routesDir = config()->path->app . $module . '/Routes';

        if ( is_dir($routesDir) == false ) {
            $this->error('Routes folder not found from your module: `' . $module . '`');

            return;
        }

        chdir( $routesDir );
        $stub = str_replace('{namespace}',           'App\\' . $module . '\\Routes',      $stub);
        $stub = str_replace('{controllerNamespace}', 'App\\' . $module . '\\Controllers', $stub);


        $this->info('Crafting Route Group...');

        if ( file_exists($file_name) ) {
            $this->error('   Route already exists!');

            return;
        }

        file_put_contents($file_name, $stub);
        $this->comment('   Route has been created!');

        chdir(config()->path->root);
        CLI::bash([
            'composer dumpautoload',
        ]);
    }

    protected function arguments()
    {
        $arguments = [
            ['name', InputArgument::REQUIRED, 'Route name to be used'],
            ['module', InputArgument::REQUIRED, 'The targetted module'],
        ];

        return $arguments;
    }
}