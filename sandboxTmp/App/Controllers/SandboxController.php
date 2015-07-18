<?php

namespace Sandbox\App\Controllers;

use Bootstrap\Support\Phalcon\Mvc\Controller as BaseController;
use Bootstrap\Facades\View;

class SandboxController extends BaseController
{
    public function testAction()
    {
        return View::make('test');
    }
}