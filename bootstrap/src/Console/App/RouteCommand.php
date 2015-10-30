<?php
namespace Bootstrap\Console\App;

use League\Flysystem\Filesystem;
use Bootstrap\Console\SlayerCommand;
use Symfony\Component\Console\Input\InputArgument;
use League\Flysystem\Adapter\Local as LeagueFlysystemAdapterLocal;

class RouteCommand extends SlayerCommand
{
    protected $name        = 'app:route';
    protected $description = 'Generate a new route group';

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

        $stub = file_get_contents(__DIR__ . '/stubs/makeRoute.stub');
        $stub = stubify($stub, [
            'routeName' => $arg_name,
            'prefixRouteName' => strtolower($arg_name),
        ]);

        $file_name = $arg_name . 'Routes.php';

        $module = $this->input->getArgument('module');
        $hasDir = is_dir(config()->path->app . $module);

        if ( $hasDir === false ) {
            $this->error('Module not found `' . $module . '`');

            return;
        }

        $module  = $this->input->getArgument('module');

        if ( $this->app->has($module) === false ) {
            $this->error('Module not found `' . $module . '`');

            return;
        }

        $routes = $module . '/routes/';
        if ( $this->app->has($routes) === false ) {
            $this->error('Routes folder not found from your module: `' . $module . '`');

            return;
        }

        $stub = stubify(
            $stub, [
                'namespace' => path_to_namespace($app_path . $routes),
                'controllerNamespace' => path_to_namespace(
                    $app_path . $module . '/controllers/'
                )
            ]
        );


        $this->info('Crafting Route...');

        if ( $this->app->has($file_name) ) {
            $this->error('   Route already exists!');

            return;
        }

        $this->app->put($routes . $file_name, $stub);
        $this->info('   ' . $file_name . ' created!');

        $this->callDumpAutoload();
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
