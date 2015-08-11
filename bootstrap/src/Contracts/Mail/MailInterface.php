<?php

namespace Bootstrap\Contracts\Mail;

interface MailInterface
{
    /**
     * Setting up the encryption type
     */
    public function encryption($encryption);

    /**
     * Set the hostname of your email driver
     */
    public function host($host);

    /**
     * Set the port of your email driver
     */
    public function port($port);

    /**
     * Set the username of your email driver
     */
    public function username($username);

    /**
     * Set the password of your email driver
     */
    public function password($password);

    /**
     * The email who acts as the sender
     */
    public function from($email);

    /**
     * The email(s) who acts as the receiver(s)
     */
    public function to(Array $emails);

    /**
     * The email(s) who acts as the blind carbon copy
     */
    // public function bcc(Array $emails);

    /**
     * The email(s) who acts as the carbon copy
     */
    // public function cc(Array $emails);

    /**
     * The email subject
     */
    public function subject($subject);

    /**
     * The email body, this calls the email content
     */
    public function body($body);

    /**
     * This will be triggered when calling Mail::send()
     */
    public function send();
}