<?php


/*
|-------------------------------------------------------------
| Die and Dump
|-------------------------------------------------------------
| Was based in laravel framework, this helper helps users to
| debug arrays or outputs
*/
if (!function_exists('dd')) {
    function dd($var)
    {
        var_dump($var);
        exit;
    }
}


/*
|-------------------------------------------------------------
| Echo Pre and Exit
|-------------------------------------------------------------
| Sometimes we need more prettier than var_dump, so this is
| the solution
*/
if (!function_exists('echo_pre')) {
    function echo_pre($var)
    {
        echo '<pre>';
        print_r($var);
        exit;
    }
}


/*
|-------------------------------------------------------------
|
|-------------------------------------------------------------
|
*/
if (!function_exists('env')) {
    function env($const, $default = '')
    {
        $val = getenv($const);
        if (empty( $val )) {
            $val = $default;
        }

        return $val;
    }
}


/*
|-------------------------------------------------------------
|
|-------------------------------------------------------------
|
*/
if (!function_exists('csrf_field')) {
    function csrf_field()
    {
        return tag()->hiddenField([
            security()->getTokenKey(),
            'value' => security()->getToken(),
        ]);
    }
}


if (!function_exists('slayer_process_time')) {
    function slayer_process_time()
    {
        return microtime(true) - SLAYER_START;
    }
}

if (!function_exists('iterate_require')) {
    function iterate_require(array $files)
    {
        $ret = [];

        foreach ($files as $file) {
            $ret[basename($file, '.php')] = require $file;
        }


        return $ret;
    }
}