<?php

namespace Bootstrap\Support\Phalcon\Mvc;

use Phalcon\Mvc\Url as Phalcon_Mvc_Url;
use Bootstrap\Facades\Response;

class URL extends Phalcon_Mvc_Url
{
    public function previous()
    {
        return $_SERVER['HTTP_REFERER'];
    }

    public function route($for, $params = [])
    {
        $params['for'] = $for;

        return $this->get($params);
    }
}