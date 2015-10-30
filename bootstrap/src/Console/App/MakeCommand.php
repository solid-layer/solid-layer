<?php
namespace Bootstrap\Console\App;

use League\Flysystem\Filesystem;
use Bootstrap\Console\SlayerCommand;
use Symfony\Component\Console\Input\InputArgument;
use League\Flysystem\Adapter\Local as LeagueFlysystemAdapterLocal;

class MakeCommand extends SlayerCommand
{
    protected $name        = 'app:make';
    protected $description = 'Generate a new module';

    private $app;
    private $public;

    public function __construct()
    {
        $this->app = new Filesystem(
            new LeagueFlysystemAdapterLocal(config()->path->app, 0)
        );

        $this->public = new Filesystem(
            new LeagueFlysystemAdapterLocal(config()->path->public, 0)
        );

        parent::__construct();
    }

    public function slash()
    {
        $app_path = str_replace(BASE_PATH, '', config()->path->app);
        $arg_name = str_slug($this->input->getArgument('name'), '_');

        $controllers = $arg_name . '/controllers/';
        $routes      = $arg_name . '/routes/';


        $routes_file      = $arg_name . '/routes.php';
        $this->app->put($routes_file, "<?php\n");

        $controller_file  = $controllers . 'Controller.php';
        $this->app->put(
            $controller_file,
            $this->getContent(
                $app_path . $controllers,
                __DIR__ . '/stubs/baseController.stub'
            )
        );

        $route_group_file = $routes . 'RouterGroup.php';
        $this->app->put(
            $route_group_file,
            $this->getContent(
                $app_path . $routes,
                __DIR__ . '/stubs/baseRoute.stub'
            )
        );

        $this->public->put(
            $arg_name . '.php',
            stubify(
                file_get_contents(__DIR__ . '/stubs/publicIndex.stub'),
                ['arg_name' => '\''.$arg_name.'\'']
            )
        );

        $this->callDumpAutoload();
    }

    private function getContent($path, $stub)
    {
        return stubify(
            file_get_contents($stub), [
                'namespace' => path_to_namespace($path),
            ]
        );
    }

    protected function arguments()
    {
        return [
            ['name', InputArgument::REQUIRED, 'The app name'],
        ];
    }
}
