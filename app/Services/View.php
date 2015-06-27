<?php

namespace App\Services;

use Bootstrap\Services\Services;
use Phalcon\Mvc\View as PhalconView;
use Phalcon\Mvc\View\Engine\Volt as PhalconVoltEngine;

class View extends Services
{
  protected $_alias = 'view';

  protected $_shared = true;

  public function dispatcher()
  {
    $view = new PhalconView();
    $view->setViewsDir($this->config->application->viewsDir);

    $view->registerEngines(array(
        '.volt' => function ($view, $di) {
            $volt = new PhalconVoltEngine($view, $di);

            $volt->setOptions(array(
                'compiledPath' => $this->config->application->storageViewDir,
                'compiledSeparator' => '_'
            ));

            return $volt;
        },
        '.phtml' => 'Phalcon\Mvc\View\Engine\Php'
    ));

    return $view;
  }
}