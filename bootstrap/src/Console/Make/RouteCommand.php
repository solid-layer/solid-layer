<?php

namespace Bootstrap\Console\Make;

use Bootstrap\Console\SlayerCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;

class RouteCommand extends SlayerCommand
{
    protected $name = 'make:route-group';

    protected $description = 'Create a new route group';

    public function slash()
    {
        $arg_name = ucfirst($this->input->getArgument('name'));


        $stub = file_get_contents(__DIR__ . '/stubs/makeRoute.stub');
        $stub = str_replace('{routeName}', $arg_name, $stub);
        $stub = str_replace('{prefixRouteName}', strtolower($arg_name), $stub);


        $file_name = $arg_name . 'Routes.php';
        chdir(config()->path->routesDir);
        $this->comment('Crafting Route Group...');


        if (file_exists($file_name)) {
            $this->error('   Route already exists!');
        } else {
            file_put_contents($file_name, $stub);

            $this->info('   Route has been created!');
        }

        $this->comment('');
        $this->comment("Add this code to your /app/routes.php");
        $this->comment("   Route::mount(new App\Routes\\" . $arg_name . "Routes);");
    }

    protected function arguments()
    {
        return [
            ['name', InputArgument::REQUIRED, 'Route name to be used'],
        ];
    }
}