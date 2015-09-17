<?php

namespace Bootstrap\Adapters\Mail;

use Bootstrap\Contracts\Mail\MailInterface;
use Mailgun\Mailgun;

class MailgunAdapter implements MailInterface
{
    private $files;
    private $encryption;
    private $host;
    private $username;
    private $password;
    private $from;
    private $to;
    private $bcc;
    private $cc;
    private $subject;
    private $html;

    public function attach($file)
    {
        $this->files[] = $file;

        return $this;
    }

    public function encryption($encryption)
    {
        $this->encryption = $encryption;

        return $this;
    }

    public function host($host)
    {
        $this->host = $host;

        return $this;
    }

    public function port($port)
    {
        $this->port = $port;

        return $this;
    }

    public function username($username)
    {
        $this->username = $username;

        return $this;
    }

    public function password($password)
    {
        $this->password = $password;

        return $this;
    }

    public function from($email)
    {
        $this->from = $email;

        return $this;
    }

    public function to(array $emails)
    {
        $this->to = implode(', ', $emails);

        return $this;
    }

    public function bcc(array $emails)
    {
        $this->bcc = $emails;

        return $this;
    }

    public function cc(array $emails)
    {
        $this->cc = $emails;

        return $this;
    }

    public function subject($subject)
    {
        $this->subject = $subject;

        return $this;
    }

    public function body($body)
    {
        $this->html = $body;

        return $this;
    }

    public function send()
    {
        // dd($this->getData());

        $mailgun = new Mailgun($this->getSecretKey());

        return $mailgun->sendMessage(
            $this->getDomain()
            ,$this->getData()
            ,$this->getFiles()
        );
    }

    private function getData()
    {
        $ret = [
            'from'    => $this->from,
            'subject' => $this->subject,
            'html'    => $this->html,
        ];

        if ( !empty($this->to) ) {
            $ret['to'] = $this->to;
        }

        if ( !empty($this->cc) ) {
            $ret['cc'] = $this->cc;
        }

        if ( !empty($this->bcc) ) {
            $ret['bcc'] = $this->bcc;
        }

        return $ret;
    }

    private function getFiles()
    {
        $ret = [];

        if ( count($this->files) ) {
            foreach ($this->files as $file) {
                $ret['attachment'][] = $file;
            }
        }

        return $ret;
    }

    private function getSecretKey()
    {
        return config()->services->mailgun->secret;
    }

    private function getDomain()
    {
        return config()->services->mailgun->domain;
    }

}