<?php

return [

    'main'  => function (Phalcon\Di\FactoryDefault $di) {

        $di
            ->get('dispatcher')
            ->setDefaultNamespace('App\Main\Controllers');
    },

    'acme' => function (Phalcon\Di\FactoryDefault $di) {

        $acme = $di->get('acme');

        $views_dir = $acme->getViewsDir();
        if (is_dir(base_path('resources/views/vendor/acme'))) {
            $views_dir = base_path('resources/views/vendor/acme');
        }

        $lang_dir = $acme->getLangDir();
        if (is_dir(base_path('resources/lang/vendor/acme'))) {
            $lang_dir = base_path('resources/lang/vendor/acme');
        }

        # - set the views dir and lang dir
        $di->get('view')->setViewsDir($views_dir);
        $di->get('lang')->setLangDir($lang_dir);
        $di
            ->get('dispatcher')
            ->setDefaultNamespace('Acme\Acme\App\Controllers');
    },
];
