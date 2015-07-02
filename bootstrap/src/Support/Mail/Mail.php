<?php

namespace Bootstrap\Support\Mail;

use Bootstrap\Facades\View;

class Mail
{
    private $body;
    private $params;

    public function initialize($view, $params)
    {
        $settings = slayer_config()->app->mailer;
        $adapter_class = @slayer_config()->mailers->toArray()[$settings->adapter];
        if (! $adapter_class) {
            throw new \Exception('Adapter not found.');
        }

        $body = View::take($view, $params);

        $obj = (new $adapter_class);
        $obj
            ->host($settings->host)
            ->port($settings->port)
            ->username($settings->username)
            ->password($settings->password)
            ->body($body);

        return $obj;
    }

    public function send($view, $params, $callback)
    {
        $self = new self;

        $init = $self->initialize($view, $params);
        call_user_func($callback, $init);

        $init->send();
    }

}