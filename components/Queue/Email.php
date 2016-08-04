<?php

namespace Components\Queue;

use Mail;
use Clarity\Contracts\Mail\MailInterface;

class Email extends
{
    public function listener($console, $job, $data)
    {
        if (isset($data['function'])) {
            $this->{$data['function']}($console, $job, $data);
        }
    }

    public function registeredSender($console, $job, $data)
    {
        $to = $data['to'];
        $url = $data['url'];
        $subject = $data['subject'];
        $template = $data['template'];

        $console->info('Job: '.$job->getId().' currently processing...');
        $console->info('   Email: '.$to);
        $console->info('   URL: '.$url);
        $console->info('   Subject: '.$subject);
        $console->info('   Template: '.$template);

        Mail::send(
            $template,
            ['url' => $url],
            function (MailInterface $mail) use ($to, $subject) {
                $mail->to([$to]);
                $mail->subject($subject);
            }
        );

        $console->info('--------- done ---------');

        $job->delete();
    }
}
