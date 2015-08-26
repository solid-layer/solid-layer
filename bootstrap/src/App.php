<?php

use Components\Exceptions\Handler as ErrorHandler;
use Bootstrap\Exceptions\FileNotFoundException;
use Bootstrap\Facades\Facade;
use Bootstrap\Services\Service\ServiceContainer;
use Dotenv\Dotenv;
use Phalcon\Config;
use Phalcon\Di\FactoryDefault;
use Phalcon\Mvc\Application;

class App
{
    private $di;
    private $app;

    /**
     * Load our dependencies by locating our vendor
     *
     * @param string $base The base folder before accessing vendor autoloader
     */
    public function __construct($base)
    {
        define('SLAYER_START', microtime(true));

        require_once $base . '/vendor/autoload.php';
    }


    /**
     * This lives all the configurations and settings to load all components
     *
     * @return mixed
     */
    public function bootstrap()
    {
        $this->di = new FactoryDefault;

        # - we must inject our dependencies inside the Phalcon
        # application layer

        $this->app = new Application($this->di);


        # - load the .env file, that will enteract with
        # configurations, for environment specific

        $dotenv = new Dotenv(BASE_PATH);
        $dotenv->load();


        # - let's create an empty config with just an empty
        # array, this is just for us to prepare the config

        $this->di->set('config', function() {
            return new Config([]);
        }, true);


        # - get the paths and merge the array values to the
        # empty config as we instantiated above

        $path = require_once BASE_PATH . '/config/path.php';
        $this->di->get('config')->merge( new Config(['path' => $path]) );


        # - require our collection of helpers before we proceed
        # to merging all the config files.

        require_once __DIR__ . '/helpers.php';


        # - iterate all the base config files and require
        # the files to return an array values

        $base_config_files = iterate_require(
            folder_files($path['config'])
        );


        # - iterate all the environment config files and
        # process the same thing as the base config files

        $env_config_files  = iterate_require(
            folder_files($path['config'] . getenv('APP_ENV'))
        );


        # - merge the base config files and the environment
        # config files as one in the our DI 'config'

        config()->merge( new Config($base_config_files) );
        config()->merge( new Config($env_config_files) );


        # - load our global facade class to handle singleton
        # like access

        Facade::setFacadeApplication($this->app);


        # - load all the service providers, providing our
        # native phalcon classes

        $container = new ServiceContainer;
        foreach (config()->app->services as $provider) {
            $container->addServiceProvider(new $provider);
        }


        # - get all our modules and register it to our phalcon
        # application

        $this->app->registerModules(
            require BASE_PATH . '/bootstrap/modules.php'
        );

        # - handle errors and exceptions

        $this->getErrorHandler()->report();


        # - check if system is modular or not

        if ( ! config()->app->modular ) {
            $main_route_file = BASE_PATH . '/app/routes.php';
            if ( ! file_exists($main_route_file)) {
                throw new FileNotFoundException($main_route_file . ' not found!');
            }

            require_once BASE_PATH . '/app/routes.php';
        }

        return $this;
    }


    /**
     * Return an instance of Exceptions Handler
     *
     * @return mixed App\Exceptions\Handler
     */
    public function getErrorHandler()
    {
        return new ErrorHandler;
    }


    /**
     * Render the system content
     */
    public function render()
    {
        echo $this->app->handle()->getContent();
    }


    /**
     * Here, you will be loading the system by defining the module
     *
     * @param string $module The module name
     * @return mixed $this->app
     */
    public function run($module = null)
    {
        if ( ! config()->app->modular ) {
            return $this;
        }

        if ( ! empty($module) ) {
            require_once BASE_PATH . '/app/' . $module . '/routes.php';

            $this->app->setDefaultModule($module);
        }

        return $this;
    }
}