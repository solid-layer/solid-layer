<?php

namespace Acme\Acme;

use Bootstrap\Services\Service\ServiceProvider;
use Acme\Acme\App\Console\AcmeConsoleCommand;

class AcmeServiceProvider extends ServiceProvider
{
    protected $_alias = 'acme';

    public function boot()
    {
        $this->publish([
            __DIR__ . '/resources/views' => base_path('resources/views/vendor/acme'),
        ], 'views');

        $this->publish([
            __DIR__ . '/resources/lang' => base_path('resources/lang/vendor/acme'),
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

        $this->console->add(new AcmeConsoleCommand);

        return $this;
    }
}