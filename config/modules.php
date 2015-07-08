<?php

return [
    'slayer' => function($di) {

        # By default, the sample below are already loaded
        # when providers are loaded.
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
        $lang_dir = $_sandbox->getLangDir();

        $di->get('view')->setViewsDir($views_dir);
        $di->get('lang')->setLangDir($lang_dir);
        $di
            ->get('dispatcher')
            ->setDefaultNamespace('Sandbox\App\Controllers');
    },
];