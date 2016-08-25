<?php

namespace Components\Exceptions;

class CsrfHandler
{
    const STATUS_CODE = 401;

    public function handle($e)
    {
        # errors coming from ACL or anything that throws from
        # AccessNotAllowedException class.
        #
        # handle it by providing a page that there is no privilege
        # to access the website.
        #
        # the code below prints the exception message,
        # you can point it to your views folder or log the message
        # internally.

        $content = di()->get('view')->take('errors.whoops', [
            'e' => $e,
        ]);

        $response = di('response');
        $response->setContent($content);
        $response->setStatusCode(self::STATUS_CODE);

        return $response->send();
    }
}
