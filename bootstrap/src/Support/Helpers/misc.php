<?php

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


/*
|-------------------------------------------------------------
|
|-------------------------------------------------------------
|
*/
if (!function_exists('slayer_process_time')) {
    function slayer_process_time()
    {
        return microtime(true) - SLAYER_START;
    }
}


/*
|-------------------------------------------------------------
|
|-------------------------------------------------------------
|
*/
if (!function_exists('iterate_require')) {
    function iterate_require(array $files)
    {
        $results = [];

        foreach ($files as $file) {
            $results[basename($file, '.php')] = require $file;
        }


        return $results;
    }
}


/*
|-------------------------------------------------------------
|
|-------------------------------------------------------------
|
*/
if (!function_exists('stubify')) {
    function stubify($content, $params)
    {
        foreach ($params as $key => $value) {
            $content = str_replace('{'.$key.'}', $value, $content);
        }

        return $content;
    }
}


/*
|-------------------------------------------------------------
|
|-------------------------------------------------------------
|
*/
if (!function_exists('path_to_namespace')) {
    function path_to_namespace($path)
    {
        $path = trim(str_replace('/', ' ', $path));
        $exploded_path = explode(' ', $path);

        $ret = [];

        foreach ($exploded_path as $word) {
            $ret[] = ucfirst($word);
        }

        return studly_case(implode('\\', $ret));
    }
}
