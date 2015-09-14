<?php

namespace Bootstrap\Adapters\Mail;

use Bootstrap\Contracts\Mail\MailInterface;
use Mailgun\Mailgun;

class MailgunAdapter implements MailInterface
{
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
        $mailgun = new Mailgun($this->getKey());

        return $mailgun->sendMessage($this->getDomain(), [
            'from'    => $this->from,
            'to'      => $this->to,
            'cc'      => $this->cc,
            'bcc'     => $this->bcc,
            'subject' => $this->subject,
            'html'    => $this->html,
        ]);
    }

    private function getKey()
    {
        return config()->mailer->mailgun->secret;
    }

    private function getDomain()
    {
        return config()->mailer->mailgun->domain;
    }

}