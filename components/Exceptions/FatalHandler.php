<?php

namespace Components\Exceptions;

class FatalHandler
{
    const STATUS_CODE = 500;

    public function handle($e)
    {
        $content = di()->get('view')->take('errors.whoops', [
            'e' => $e,
        ]);

        $response = di('response');
        $response->setContent($content);
        $response->setStatusCode(self::STATUS_CODE);

        return $response->send();
    }
}
