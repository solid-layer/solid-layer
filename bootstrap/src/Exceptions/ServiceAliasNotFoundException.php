<?php

namespace Bootstrap\Exceptions;

use Exception;
use Whoops\Handler\PrettyPageHandler;

class ServiceAliasNotFoundException extends SlayerException
{
  public function handle()
  {
    $handler = new PrettyPageHandler();
    return $handler;
  }
}