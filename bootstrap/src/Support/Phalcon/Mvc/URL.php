<?php

namespace Bootstrap\Support\Phalcon\Mvc;

use Phalcon\Mvc\Url as Phalcon_Mvc_Url;
use Bootstrap\Facades\Response;
use Bootstrap\Facades\Route;

class URL extends Phalcon_Mvc_Url
{
    public function previous()
    {
        return $_SERVER['HTTP_REFERER'];
    }

    public function route($for, $params = [], $pres = [])
    {
        $params['for'] = $for;

        return $this->get($params, $pres);
    }

    public function current()
    {
        return env('BASE_URI') . Route::getRewriteUri();
    }
}