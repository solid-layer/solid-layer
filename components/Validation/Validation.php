<?php

namespace Components\Validation;

use Phalcon\Validation as BaseValidation;

class Validation extends BaseValidation
{
    public static function toHtml($messages)
    {
        $error_messages = '';

        foreach ($messages as $m) {
            $error_messages .= '<li>'.$m->getMessage().'</li>';
        }

        return sprintf('
            Please check the error below:<br>
                <ul>%s</ul>',
            $error_messages
        );
    }
}
