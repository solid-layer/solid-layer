<?php

namespace Bootstrap\Support\Mail;

interface MailInterface
{
    public function host($host);
    public function port($port);

    public function username($username);
    public function password($password);

    public function from($email);
    public function to(Array $emails);

    public function subject($subject);
    public function body($body);

    public function send();
}