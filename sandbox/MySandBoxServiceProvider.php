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
            __DIR__ . '/resources/views' => base_path('resources/views/vendor/sandbox'),
        ], 'views');

        $this->publish([
            __DIR__ . '/resources/lang' => base_path('resources/lang/vendor/sandbox'),
        ], 'lang');
    }

    public function getViewsDir()
    {
        return __DIR__ . '/resources/views';
    }

    public function getLangDir()
    {
        return __DIR__ . '/resources/lang';
    }

    public function register()
    {
        require __DIR__ . '/app/routes.php';

        $this->console->add(new MySandboxCommand);

        return $this;
    }
}