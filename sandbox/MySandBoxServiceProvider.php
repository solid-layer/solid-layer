<?php

namespace Sandbox;

use Bootstrap\Services\Service\ServiceProvider;
use Sandbox\App\Console\MySandboxCommand;

class MySandBoxServiceProvider extends ServiceProvider
{
    protected $_alias = 'sandbox';

    public function boot()
    {
        $this->publish([
            __DIR__ . '/Resources/views' => base_path('resources/views/vendor/sandbox'),
        ], 'views');

        $this->publish([
            __DIR__ . '/Resources/lang' => base_path('resources/lang/vendor/sandbox'),
        ], 'lang');
    }

    public function getViewsDir()
    {
        return __DIR__ . '/Resources/views';
    }

    public function getLangDir()
    {
        return __DIR__ . '/Resources/lang';
    }

    public function register()
    {
        require __DIR__ . '/App/routes.php';

        $this->console->add(new MySandboxCommand);

        return $this;
    }
}