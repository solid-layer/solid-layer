<?php

namespace App\Services;

use Bootstrap\Services\ServiceContainer;
use Bootstrap\Phalcon\Mvc\View as PhalconView;
use Phalcon\Mvc\View\Engine\Volt as PhalconVoltEngine;

class View extends ServiceContainer
{
  protected $_alias = 'view';

  protected $_shared = true;

  public function boot()
  {
    $view = new PhalconView();
    $view->setViewsDir($this->getConfig()->application->viewsDir);

    $view->registerEngines(array(
        '.volt' => function ($view, $di) {
            $volt = new PhalconVoltEngine($view, $di);

            $volt->setOptions(array(
                'compiledPath' => $this->getConfig()->application->storageViewDir,
                'compiledSeparator' => '_'
            ));

            return $volt;
        },
        '.phtml' => 'Phalcon\Mvc\View\Engine\Php'
    ));

    return $view;
  }

  // public function beforeBoot()
  // {
  //     $this->getApp()->handle();
  // }

}