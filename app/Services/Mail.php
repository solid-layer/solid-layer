<?php

namespace App\Services;

use Bootstrap\Services\Service\ServiceContainer;
use Bootstrap\Support\Mail\Mail as SupportMail;

class Mail extends ServiceContainer
{
  protected $_alias = 'mail';

  protected $_shared = false;

  public function boot()
  {
    $settings = slayer_config()->app->mailer;
    $adapter_class = @slayer_config()->app->mailer->classes->toArray()[$settings->adapter];
    if (! $adapter_class) {
        throw new \Exception('Adapter not found.');
    }

    return new SupportMail(new $adapter_class, $settings);
  }

}