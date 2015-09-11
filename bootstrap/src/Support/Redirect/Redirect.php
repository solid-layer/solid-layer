<?php

namespace Bootstrap\Support\Redirect;

use Bootstrap\Support\WithMagicMethodTrait;

class Redirect
{
    use WithMagicMethodTrait;

    public function to($url)
    {
        di()->get('response')->redirect($url);

        return $this;
    }

    public function with($key, $value)
    {
        di()->get('flash')->set($key, $value);

        return $this;
    }

}