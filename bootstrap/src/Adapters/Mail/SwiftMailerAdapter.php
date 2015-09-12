<?php

namespace Bootstrap\Adapters\Mail;

use Bootstrap\Contracts\Mail\MailInterface;
use Swift_Message;
use Swift_SmtpTransport;
use Swift_Mailer;

class SwiftMailerAdapter implements MailInterface
{
    private $encryption;
    private $host;
    private $username;
    private $password;
    private $mailer;
    private $message;
    private $port;

    public function __construct()
    {
        $this->message = Swift_Message::newInstance();
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
        $this->message->setFrom($email);

        return $this;
    }

    public function to(array $emails)
    {
        $this->message->setTo($emails);

        return $this;
    }

    public function subject($subject)
    {
        $this->message->setSubject($subject);

        return $this;
    }

    public function body($body)
    {
        $this->message->addPart($body, 'text/html');

        return $this;
    }

    public function send()
    {
        $transport = Swift_SmtpTransport::newInstance();
        $transport
            ->setHost($this->host)
            ->setPort($this->port)
            ->setUsername($this->username)
            ->setPassword($this->password);

        if ($this->encryption) {
            $transport->setEncryption($this->encryption);
        }

        $mailer = Swift_Mailer::newInstance($transport);

        return $mailer->send($this->message);
    }
}