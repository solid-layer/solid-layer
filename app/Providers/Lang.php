<?php

namespace App\Providers;

use Bootstrap\Services\Service\ServiceProvider;
use Bootstrap\Support\Lang\Lang as SupportLang;

class Lang extends ServiceProvider
{
    protected $_alias = 'lang';

    protected $_shared = false;

    public function register()
    {
        $lang = config()->app->lang;
        $dir = config()->path->langDir . $lang;

        return new SupportLang($dir);
    }
}