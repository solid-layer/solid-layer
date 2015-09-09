<?php

namespace Bootstrap\Console;

class CLI
{
    public static function bash($lines)
    {
        $combined = null;

        foreach ( $lines as $line ) {
            $combined .= "echo \"\e[32m{$line}\e[37m\";" .  $line . ";\n";
        }

        return shell_exec($combined . " 2>&1");
    }
}