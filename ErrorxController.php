<?php

namespace App\Controllers;

use Bootstrap\Facades\Request;
use Bootstrap\Facades\View;

class ErrorxController extends Controller
{
    public function initialize()
    {
        $this->acl('default');
    }

    public function indexAction()
    {
        return View::make('welcome.index');
    }

    public function storeAction()
    {
        if (Request::isPost()) {
            // do some stuff....
        }
    }

    public function showAction($id)
    {
        return View::make('welcome.show')
            ->with('id' => $id)
            ->batch([
                'var1' => 'val1',
                'var2' => 'val2',
            ]);
    }

    public function deleteAction($id)
    {
        if (Request::isAjax()) {
            // do some stuff....
        }
    }

    public function updateAction($id)
    {
        if (Request::isPost()) {
            // do some stuff....
        }
    }
}