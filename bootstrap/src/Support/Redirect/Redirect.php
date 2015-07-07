<?php

namespace Bootstrap\Support\Redirect;

use Bootstrap\Facades\Response;
use Bootstrap\Facades\Flash;

class Redirect
{
    public function to($url)
    {
        return Response::redirect($url);
    }

    public function with($key, $value)
    {
        Flash::message($key, $value);
    }

}