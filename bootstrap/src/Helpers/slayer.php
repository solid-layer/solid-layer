<?php

/*
|-------------------------------------------------------------
| Global config provided in the phalcon
|-------------------------------------------------------------
| returns the global configuration
*/
if (! function_exists('config')) {
  function config() {
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