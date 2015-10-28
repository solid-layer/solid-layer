<?php

/*
|-------------------------------------------------------------
| Phalcon Mvc Application
|-------------------------------------------------------------
| returns the DI instanced in the phalcon factory
*/
if (!function_exists('di')) {
    function di()
    {
        return \Phalcon\DI::getDefault();
    }
}
