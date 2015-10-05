<?php

namespace Acme\Acme\App\Controllers;

use Bootstrap\Support\Phalcon\Mvc\Controller as BaseController;
use Bootstrap\Facades\View;

class AcmeController extends BaseController
{
    public function testAction()
    {
        return View::make('test');
    }
}