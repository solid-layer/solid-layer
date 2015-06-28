<?php

namespace Bootstrap\Exceptions;

use Whoops\Handler\PrettyPageHandler;
use Exception;

class ControllerNotFoundException extends SlayerException 
{
  public function handle()
  {
    $handler = new PrettyPageHandler();
    return $handler;
  }
}