<?php

namespace Bootstrap\Support\Mail;

use Bootstrap\Facades\View;

class Mail
{
    private $body;
    private $params;
    private $adapter_obj;
    private $config;

    public function __construct(MailInterface $adapter_obj, $config)
    {
        $this->adapter_obj = $adapter_obj;
        $this->config = $config;
    }

    public function initialize($view, $params)
    {
        $body = View::take($view, $params);

        $maps = [
            'host',
            'port',
            'username',
            'password',
            'encryption',
        ];

        # we need to loop the maps
        foreach ($maps as $map) {

            # now call the adapter function
            # e.g 
            #   $this->adapter_obj->host($this->config->host);
            #
            $this->adapter_obj->{$map}($this->config->{$map});
        }

        $this->adapter_obj
            ->from(slayer_config()->app->mailer->from)
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