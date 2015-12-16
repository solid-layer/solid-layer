<?php
namespace Components\Exceptions;

class FatalHandler
{
    public function handle($e)
    {
        # - the code below will be your custom error view

        echo di()->get('view')->take('errors.whoops', [
            'e' => $e,
        ]);
        return;
    }
}
