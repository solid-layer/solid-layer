<?php
namespace Bootstrap\Providers;

use Bootstrap\Support\Lang\Lang as SupportLang;

class Lang extends ServiceProvider
{
    protected $alias  = 'lang';
    protected $shared = false;

    public function register()
    {
        $language = config()->app->lang;

        $translation = new SupportLang($dir);
        $translation
            ->setLanguage($language)
            ->setLangDir(config()->path->lang);

        return $translation;
    }
}
