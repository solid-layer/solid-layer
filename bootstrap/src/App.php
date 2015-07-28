<?php

namespace Bootstrap;

use Phalcon\Di\FactoryDefault;
use Phalcon\Mvc\Application;

class App
{
    public function run()
    {
        $di = new FactoryDefault;

        # -------------------------------------------------------------
        # Instantiate Phalcon App
        # -------------------------------------------------------------
        # ---- We must inject our dependencies inside the Phalcon
        # application layer, to make everything works.
        $app = new Application($di);



        # -------------------------------------------------------------
        # Bootstrapping Phalcon to be Slayer
        # -------------------------------------------------------------
        # ---- How cool is that, this line of code will boot/start our
        # system, all the configurations, dispatchers, and etc will
        # live on this part

        require_once APP_ROOT . '/bootstrap/autoload.php';



        # -------------------------------------------------------------
        # Whoops Debugger
        # -------------------------------------------------------------
        # ---- on top of our application, we should call our debugger
        # this allows us to switch our debugger for development
        # analysis

        new Debugger($di);


        $exceptions = new HandleExceptions;
        $exceptions->bootstrap();


        # - This will echo the rendered view from phalcon dispatcher
        echo $app->handle()->getContent();
    }
}