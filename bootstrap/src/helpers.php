<?php


/*
|-------------------------------------------------------------
| Global config provided in the phalcon
|-------------------------------------------------------------
| returns the global configuration
*/
if (! function_exists('slayer_config')) {
  function slayer_config() {
    return $GLOBALS['__config'];
  }
}

/*
|-------------------------------------------------------------
| Dependency Injection
|-------------------------------------------------------------
| returns the APP instanced
*/
if (! function_exists('app')) {
  function app() {
    return $GLOBALS['__app'];
  }
}

/*
|-------------------------------------------------------------
| Phalcon Mvc Application
|-------------------------------------------------------------
| returns the DI instanced in the phalcon factory
*/
if (! function_exists('di')) {
  function di() {
    return app()->getDi();
  }
}

/*
|-------------------------------------------------------------
| Route from DI
|-------------------------------------------------------------
| Returning the injected 'router' in the DI
*/
if (! function_exists('route')) {
  function route() {
    return di()->get('router');
  }
}


/*
|-------------------------------------------------------------
| Response from DI
|-------------------------------------------------------------
| Returning the injected 'response' in the DI
*/
if (! function_exists('response')) {
  function response() {
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
  function view() {
    return di()->get('view');
  }
}


/*
|-------------------------------------------------------------
| Die and Dump
|-------------------------------------------------------------
| Was based in laravel framework, this helper helps users to
| debug arrays or outputs
*/
if (! function_exists('dd')) {
  function dd($var) {
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
if (! function_exists('echo_pre')) {
  function echo_pre($var) {
    echo '<pre>';
    print_r($var);
    exit;
  }
}