<?php
namespace Acme\Acme\App\Controllers;

use Bootstrap\Facades\View;
use Bootstrap\Support\Phalcon\Mvc\Controller as BaseController;

class AcmeController extends BaseController
{
    public function testAction()
    {
        return View::make('test');
    }
}
