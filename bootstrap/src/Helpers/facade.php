<?php

/*
|-------------------------------------------------------------
| Security from DI
|-------------------------------------------------------------
| Returning the injected 'security' in the DI
*/
if (! function_exists('security')) {
    function security()
    {
        return di()->get('security');
    }
}

/*
|-------------------------------------------------------------
| Tag from DI
|-------------------------------------------------------------
| Returning the injected 'tag' in the DI
*/
if (! function_exists('tag')) {
    function tag()
    {
        return di()->get('tag');
    }
}

/*
|-------------------------------------------------------------
| Route from DI
|-------------------------------------------------------------
| Returning the injected 'router' in the DI
*/
if (! function_exists('route')) {
    function route($name = null, $params = []) 
    {
        if ($name == null) {
            return di()->get('router');
        }

        return url()->route($name, $params);
    }
}


/*
|-------------------------------------------------------------
| Response from DI
|-------------------------------------------------------------
| Returning the injected 'response' in the DI
*/
if (! function_exists('response')) {
    function response() 
    {
        return di()->get('response');
    }
}


/*
|-------------------------------------------------------------
| View from DI
|-------------------------------------------------------------
| Returning the injected 'view' in the DI
*/
if (! function_exists('view')) {
    function view($path = null, $params = []) 
    {
        $view = di()->get('view');
        if ($path == null)
            return $view;

        return $view->make($path, $params);
    }
}


/*
|-------------------------------------------------------------
| Config from DI
|-------------------------------------------------------------
| Returning the injected 'config' in the DI
*/
if (! function_exists('config')) {
    function config($path = null) 
    {
        $config = di()->get('config');
        if ($path == null) {
            return $config;
        }

        $exploded_path = explode('.', $path);

        $last = $config;
        foreach ($exploded_path as $p) {
            $last = $last->{$p};
        }

        return $last;
    }
}


/*
|-------------------------------------------------------------
| URL from DI
|-------------------------------------------------------------
| Returning the injected 'url' in the DI
*/
if (! function_exists('url')) {
    function url($href = null, $params = []) 
    {
        $url = di()->get('url');
        if ($href == null)
            return $url;

        return  $url->get($href, $params);
    }
}


/*
|-------------------------------------------------------------
| Redirect from DI
|-------------------------------------------------------------
| Returning the injected 'redirect' in the DI
*/
if (! function_exists('redirect')) {
    function redirect($to = null) 
    {
        $redirect = di()->get('redirect');
        if ($to == null)
            return $redirect;

        return  $redirect->to($to);
    }
}

/*
|-------------------------------------------------------------
| Request from DI
|-------------------------------------------------------------
| Returning the injected 'request' in the DI
*/
if (! function_exists('request')) {
    function request()
    {
        return di()->get('request');
    }
}