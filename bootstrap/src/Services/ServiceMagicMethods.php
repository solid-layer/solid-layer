<?php

namespace Bootstrap\Services;

trait ServiceMagicMethods
{
    public function __get($name)
    {
        return di()->get($name);
    }
}