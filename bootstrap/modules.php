<?php

return [

    'slayer'  => function ($di) {

        $di
            ->get('dispatcher')
            ->setDefaultNamespace('App\Slayer\Controllers');
    },

    'sandbox' => function ($di) {

        $sandbox = $di->get('sandbox');

        $views_dir = $sandbox->getViewsDir();
        if (is_dir(base_path('resources/views/vendor/sandbox'))) {
            $views_dir = base_path('resources/views/vendor/sandbox');
        }

        $lang_dir = $sandbox->getLangDir();
        if (is_dir(base_path('resources/lang/vendor/sandbox'))) {
            $lang_dir = base_path('resources/lang/vendor/sandbox');
        }

        # - set the views dir and lang dir
        $di->get('view')->setViewsDir($views_dir);
        $di->get('lang')->setLangDir($lang_dir);
        $di
            ->get('dispatcher')
            ->setDefaultNamespace('Sandbox\App\Controllers');
    },
];