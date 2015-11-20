<?php
namespace Acme\Acme\App\Controllers;

use Clarity\Facades\View;
use Clarity\Support\Phalcon\Mvc\Controller as BaseController;

class AcmeController extends BaseController
{
    public function testAction()
    {
        return View::make('test');
    }
}
