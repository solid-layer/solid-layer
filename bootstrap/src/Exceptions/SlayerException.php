<?php

namespace Bootstrap\Exceptions;

use Exception;
use Bootstrap\Facades\Whoops;

class SlayerException extends Exception
{
  public function __construct($message, $code = 0, Exception $previous = null)
  {
    $whoops = Whoops::pushHandler($this->handle());
    $whoops->register();
    
    parent::__construct($message, $code, $previous);
  }
}