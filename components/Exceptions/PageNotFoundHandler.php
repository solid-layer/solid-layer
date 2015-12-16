<?php
namespace Components\Exceptions;

class PageNotFoundHandler
{
    public function handle($e)
    {
        # - the code below will be your custom error view

        echo di()->get('view')->take('errors.404', [
            'e' => $e,
        ]);
        return;
    }
}
