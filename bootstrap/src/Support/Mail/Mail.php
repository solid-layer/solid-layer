<?php

namespace Bootstrap\Support\Mail;

use Bootstrap\Facades\View;

class Mail
{
    private $body;
    private $params;
    private $adapter_obj;
    private $settings;

    public function __construct(MailInterface $adapter_obj, $settings)
    {
        $this->adapter_obj = $adapter_obj;
        $this->settings = $settings;
    }

    public function initialize($view, $params)
    {
        $body = View::take($view, $params);

        $this->adapter_obj
            ->host($this->settings->host)
            ->port($this->settings->port)
            ->username($this->settings->username)
            ->password($this->settings->password)
            ->body($body);

        return $this->adapter_obj;
    }

    public function send($view, $params, $callback)
    {
        $init = $this->initialize($view, $params);
        call_user_func($callback, $init);

        $init->send();
    }

}