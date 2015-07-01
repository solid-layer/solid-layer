<?php

namespace App\Services;

use Bootstrap\Services\Service\ServiceContainer;
use Bootstrap\Support\Phalcon\Mvc\View as PhalconView;
use Bootstrap\Laravel\Blade\BladeAdapter;
use Phalcon\Mvc\View\Engine\Volt as PhalconVoltEngine;

class View extends ServiceContainer
{
    protected $_alias = 'view';

    protected $_shared = false;

    public function boot()
    {
      $view = new PhalconView();
      $view->setViewsDir($this->getConfig()->path->viewsDir);

      $view->registerEngines([

            '.volt' => 
                function ($view, $di) {
                    $volt = new PhalconVoltEngine($view, $di);

                    $volt->setOptions(array(
                        'compiledPath' => $this->getConfig()->path->storageViewDir,
                        'compiledSeparator' => '_',
                    ));

                    return $volt;
                },

            '.phtml' => 
                'Phalcon\Mvc\View\Engine\Php',
        ]);

      return $view;
    }

}