<?php

namespace App\Providers\Slayer;

use Bootstrap\Services\Service\ServiceProvider;
use Bootstrap\Support\Mail\Mail as SupportMail;

class Mail extends ServiceProvider
{
    protected $_alias = 'mail';

    protected $_shared = false;

    public function register()
    {
        $settings = config()->app->mailer;
        $adapter_class = @config()->app->mailer->classes->toArray()[$settings->adapter];
        if (! $adapter_class) {
            throw new \Exception('Adapter not found.');
        }

        return new SupportMail(new $adapter_class, $settings);
    }

}