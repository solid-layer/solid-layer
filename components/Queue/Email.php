<?php
namespace Components\Queue;

use Mail;
use Clarity\Contracts\Mail\MailInterface;

class Email
{
    public function registeredSender($console, $job, $data)
    {
        $console->info('Job ID: ' . $job->getId() . ' currently processing');

        $to       = $data['to'];
        $url      = $data['url'];
        $subject  = $data['subject'];
        $template = $data['template'];

        Mail::send(
            $template,
            ['url' => $url],
            function (MailInterface $mail) use ($to, $subject) {
                $mail->to([$to]);
                $mail->subject($subject);
            }
        );

        $console->info('     done...');

        $job->delete();
    }
}
