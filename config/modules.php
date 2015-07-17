<?php

return [

    'slayer' => function($di) {

        // $di
        //     ->get('view')
        //     ->setViewsDir(config()->path->viewsDir);
        // $di
        //     ->get('dispatcher')
        //     ->setDefaultNamespace('App\Controllers');
    },

    'sandbox' => function($di) {
        $_sandbox = $di->get('sandbox');

        $views_dir = $_sandbox->getViewsDir();
        if (is_dir(base_path('resources/views/vendor/sandbox'))) {
            $views_dir = base_path('resources/views/vendor/sandbox');
        }

        $lang_dir = $_sandbox->getLangDir();
        if (is_dir(base_path('resources/lang/vendor/sandbox'))) {
            $lang_dir = base_path('resources/lang/vendor/sandbox');
        }

        $di->get('view')->setViewsDir($views_dir);
        $di->get('lang')->setLangDir($lang_dir);
        $di
            ->get('dispatcher')
            ->setDefaultNamespace('Sandbox\App\Controllers');
    },
];