<?php

return [

    'main'  => function (Phalcon\Di\FactoryDefault $di) {

        $di->get('dispatcher')->setDefaultNamespace('App\Main\Controllers');
    },

    'acme' => function (Phalcon\Di\FactoryDefault $di) {

        $acme = $di->get('acme');


        # default folders

        $views_dir = $acme->getViewsDir();
        $lang_dir = $acme->getLangDir();


        # published folders

        $base_views_dir = base_path('resources/views/vendor/acme');
        $base_lang_dir = base_path('resources/lang/vendor/acme');

        if ( is_dir($base_views_dir) ) {
            $views_dir = $base_views_dir;
        }

        if ( is_dir($base_lang_dir) ) {
            $lang_dir = $base_lang_dir;
        }

        $di->get('view')->setViewsDir($views_dir);
        $di->get('lang')->setLangDir($lang_dir);

        $di->get('dispatcher')->setDefaultNamespace('Acme\Acme\App\Controllers');
    },
];
