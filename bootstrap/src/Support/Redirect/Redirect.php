<?php

namespace Bootstrap\Support\Redirect;

use Phalcon\Session\Bag as PhalconSessionBag;
use Bootstrap\Support\WithMagicMethodTrait;
use Bootstrap\Facades\Response;
use Bootstrap\Facades\Session;

class Redirect
{
    use WithMagicMethodTrait;

    public function to($url)
    {
        Response::redirect($url);

        return $this;
    }

    public function with($key, $value)
    {
        di()->get('flash')->set($key, $value);

        return $this;
    }

}