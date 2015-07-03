<?php

namespace App\Services;

use Bootstrap\Services\Service\ServiceContainer;
use Bootstrap\Support\Lang\Lang as SupportLang;

class Lang extends ServiceContainer
{
    protected $_alias = 'lang';

    protected $_shared = false;

    public function boot()
    {
        $lang = slayer_config()->app->lang;
        $dir = slayer_config()->path->langDir . $lang;

        return new SupportLang($dir);
    }
}