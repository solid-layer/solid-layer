<?php
namespace Components\Providers\Slayer;

use Bootstrap\Services\Service\ServiceProvider;
use Bootstrap\Support\Phalcon\Mvc\Router as PhalconRouter;

class Router extends ServiceProvider
{
    protected $alias  = 'router';
    protected $shared = false;

    public function register()
    {
        # -----------------------------------------------------
        # - Disable the auto router for controller
        # -----------------------------------------------------

        $router = new PhalconRouter(false);


        # -----------------------------------------------------
        # - To enable your own 404 page, uncomment below code.
        # -----------------------------------------------------

        // $router->notFound([
        //     'controller' => 'error',
        //     'action'     => 'pageNotFound',
        // ]);


        # -----------------------------------------------------
        # - Remove the extra slashes
        # -----------------------------------------------------

        $router->removeExtraSlashes(true);


        return $router;
    }
}
