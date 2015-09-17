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
    private $app;
    private $base;
    private $di;
    private $error_handler;
    private $path;

    /**
     * Load our dependencies by locating our vendor
     *
     * @param string $base The base folder before accessing vendor autoloader
     */
    public function __construct($base)
    {
        $this->base = $base;
    }

    protected function loadComposer()
    {
        # - load composer, for dependencies

        require_once $this->base . '/vendor/autoload.php';
    }

    protected function loadOptimizedCompiledFile()
    {
        # - load the compiled file

        $compiled = BASE_PATH . '/storage/slayer/compiled.php';

        if ( file_exists($compiled) && php_sapi_name() != 'cli' ) {
            require_once $compiled;
        }
    }

    protected function loadFactory()
    {
        $this->di = new FactoryDefault;

        # - we must inject our dependencies inside the Phalcon
        # application layer

        $this->app = new Application($this->di);
    }

    protected function loadDotEnv()
    {
        # - load the .env file, that will enteract with
        # configurations, for environment specific

        if ( file_exists($this->base . '/.env') ) {
            $dotenv = new Dotenv( $this->base );
            $dotenv->load();
        }
    }

    protected function initializeConfig()
    {
        # - let's create an empty config with just an empty
        # array, this is just for us to prepare the config

        $this->di->set('config', function() {
            return new Config([]);
        }, true);
    }

    protected function loadConfigPath()
    {
        # - get the paths and merge the array values to the
        # empty config as we instantiated above

        $this->path = require_once $this->base . '/config/path.php';
        $this->di->get('config')->merge( new Config(['path' => $this->path]) );
    }

    protected function loadHelpers()
    {
        # - require our collection of helpers before we proceed
        # to merging all the config files.

        require_once __DIR__ . '/helpers.php';
    }

    protected function loadConfigFolder()
    {
        # - iterate all the base config files and require
        # the files to return an array values

        $base_config_files = iterate_require(
            folder_files($this->path['config'])
        );


        # - iterate all the environment config files and
        # process the same thing as the base config files

        $env_config_files  = iterate_require(
            folder_files($this->path['config'] . getenv('APP_ENV'))
        );


        # - merge the base config files and the environment
        # config files as one in the our DI 'config'

        config()->merge( new Config($base_config_files) );
        config()->merge( new Config($env_config_files) );
    }

    protected function loadTimeZone()
    {
        date_default_timezone_set(
            di()->get('config')->app->timezone
        );
    }

    protected function loadFacader()
    {
        # - load our global facade class to handle singleton
        # like access

        Facade::setFacadeApplication($this->app);
    }

    protected function loadServices()
    {
        # - load all the service providers, providing our
        # native phalcon classes

        $container = new ServiceContainer;

        foreach (config()->app->services as $provider) {
            $container->addServiceProvider(new $provider);
        }
    }

    protected function registerModules()
    {
        # - get all our modules and register it to our phalcon
        # application

        $this->app->registerModules(
            require $this->base . '/bootstrap/modules.php'
        );
    }

    protected function handleErrors()
    {
        # - handle errors and exceptions

        (new ErrorHandler)->report();
    }

    /**
     * This lives all the configurations and settings to load all components
     *
     * @return mixed
     */
    public function bootstrap()
    {
        $this->loadComposer();

        $this->loadOptimizedCompiledFile();

        $this->loadFactory();

        $this->loadDotEnv();

        $this->initializeConfig();

        $this->loadConfigPath();

        $this->loadHelpers();

        $this->loadConfigFolder();

        $this->loadTimeZone();

        $this->loadFacader();

        $this->loadServices();

        $this->registerModules();

        $this->handleErrors();

        return $this;
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
        require_once $this->base . '/app/' . $module . '/routes.php';

        $this->app->setDefaultModule($module);

        return $this;
    }
}