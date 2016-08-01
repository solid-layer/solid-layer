<?php

namespace Components\Exceptions;

class PageNotFoundHandler
{
    const STATUS_CODE = 404;

    public function handle($e)
    {
        $content = di('view')->take('errors.404', ['e' => $e]);

        $response = di('response');
        $response->setContent($content);
        $response->setStatusCode(self::STATUS_CODE);

        return $response->send();
    }
}
