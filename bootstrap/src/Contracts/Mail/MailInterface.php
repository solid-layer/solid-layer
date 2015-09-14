<?php

namespace Bootstrap\Contracts\Mail;

interface MailInterface
{
    /**
     * [attach description]
     */
    public function attach($file);

    /**
     * Set the encryption type
     */
    public function encryption($encryption);

    /**
     * Set the host of your mail provider
     */
    public function host($host);

    /**
     * Set the port of your mail provider
     */
    public function port($port);

    /**
     * Set the username of your mail provider
     */
    public function username($username);

    /**
     * Set the password of your mail provider
     */
    public function password($password);

    /**
     * The email who acts as the sender
     */
    public function from($email);

    /**
     * The email(s) who acts as the receiver(s)
     */
    public function to(array $emails);

    /**
     * The email(s) who acts as the blind carbon copy receiver(s)
     */
    public function bcc(array $emails);

    /**
     * The email(s) who acts as the carbon copy receiver(s)
     */
    public function cc(array $emails);

    /**
     * Set the subject of your email
     */
    public function subject($subject);

    /**
     * Set the content of your email
     */
    public function body($body);

    /**
     * This function will be triggered upon sending
     */
    public function send();
}