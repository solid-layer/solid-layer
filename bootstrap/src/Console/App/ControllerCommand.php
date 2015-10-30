<?php
namespace Bootstrap\Console\App;

use League\Flysystem\Filesystem;
use Bootstrap\Console\SlayerCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;
use League\Flysystem\Adapter\Local as LeagueFlysystemAdapterLocal;

class ControllerCommand extends SlayerCommand
{
    protected $name        = 'app:controller';
    protected $description = 'Generate a new controller';

    private $app;

    public function __construct()
    {
        $this->app = new Filesystem(
            new LeagueFlysystemAdapterLocal(config()->path->app, 0)
        );

        parent::__construct();
    }

    public function slash()
    {
        $app_path = str_replace(BASE_PATH, '', config()->path->app);
        $arg_name = studly_case(str_slug($this->input->getArgument('name'), '_'));

        # - get the main stub file

        $stub = file_get_contents(__DIR__ . '/stubs/makeController.stub');
        $stub = stubify($stub, [
            'controllerName' => $arg_name
        ]);


        # - use emptify

        if ($this->input->getOption('emptify') === true) {
            $stub = stubify($stub, [
                'controllerFunctions' => ''
            ]);
        } else {
            $controller_functions = file_get_contents(__DIR__ . '/stubs/_controllerFunctions.stub');

            $stub = stubify($stub, [
                'controllerFunctions' => $controller_functions,
                'controllerName'      => strtolower($arg_name)
            ]);
        }


        # - create the file name

        $file_name = $arg_name . 'Controller.php';

        $module  = $this->input->getArgument('module');

        if ( $this->app->has($module) === false ) {
            $this->error('Module not found `' . $module . '`');

            return;
        }

        $controllers = $module . '/controllers/';
        if ( $this->app->has($controllers) === false ) {
            $this->error('Controllers folder not found from your module: `' . $module . '`');

            return;
        }

        $stub = stubify(
            $stub, [
                'namespace' => path_to_namespace($app_path . $controllers)
            ]
        );


        $this->comment('Crafting Controller...');

        if ( $this->app->has($file_name) ) {
            $this->error('   Controller already exists!');

            return;
        }

        $this->app->put($controllers . $file_name, $stub);
        $this->info('   ' . $file_name . ' created!');

        $this->callDumpAutoload();
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
