<?php

/*
|-------------------------------------------------------------
| 
|-------------------------------------------------------------
| 
*/
if (! function_exists('route_name')) {
  function route_name($name, $params = []) 
  {
    return di()->get('url')->route($name, $params);
  }
}

/*
|-------------------------------------------------------------
| 
|-------------------------------------------------------------
| 
*/
if (! function_exists('url')) {
    function url($href, $params = []) 
    {
        return di()->get('url')->get($href, $params);
    }
}