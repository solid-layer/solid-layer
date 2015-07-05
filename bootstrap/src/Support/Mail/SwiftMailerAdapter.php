<?php

namespace Bootstrap\Support\Mail;

use Swift_Message;
use Swift_SmtpTransport;
use Swift_Mailer;

class SwiftMailerAdapter implements MailInterface
{
    private $mailer;
    private $message;
    private $encryption;
    private $host;
    private $port;
    private $username;
    private $password;

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


    public function to(Array $emails)
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
        // $this->message->setBody($body);
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