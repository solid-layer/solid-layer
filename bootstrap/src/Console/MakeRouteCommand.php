<?php

namespace Bootstrap\Console;

use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;

class MakeRouteCommand extends SlayerCommand
{
    protected $name = 'make:route';

    protected $description = 'Create a new route group';
    
    public function slash()
    {
        $arg_name = ucfirst($this->input->getArgument('name'));

        $stub = file_get_contents(__DIR__ . '/stubs/makeRoute.stub');
        $stub = str_replace('{routeName}', $arg_name, $stub);

        $file_name = $arg_name . 'Routes.php';
        chdir(slayer_config()->path->routesDir);
        $this->comment('Creating Route Group...');

        if ( file_exists($file_name) ) {
            $this->error('   Route already exists!');
        } else {
            file_put_contents($file_name, $stub);
            $this->info('   Route has been created!');
        }

        $this->comment('');
        $this->comment("Add this code to your /app/routes.php");
        $this->comment("  include __DIR__ . '/Routes/" . $arg_name . "Routes.php';");
        $this->comment("  route()->mount(new " . $arg_name . "Routes);");
    }

    protected function arguments()
    {
        return [
            ['name', InputArgument::REQUIRED, 'Route name to be used'],
        ];
    }
}