<?php
namespace Acme\Acme;

use Acme\Acme\App\Console\AcmeConsoleCommand;
use Clarity\Providers\ServiceProvider;

class AcmeServiceProvider extends ServiceProvider
{
    protected $alias  = 'acme';
    protected $shared = false;

    public function getViewsDir()
    {
        return __DIR__ . '/resources/views';
    }

    public function getLangDir()
    {
        return __DIR__ . '/resources/lang';
    }

    /**
     * {@inheritdoc}
     */
    public function boot()
    {
        $this->publish([
            __DIR__ . '/resources/views' => base_path('resources/views/vendor/acme'),
        ], 'views');

        $this->publish([
            __DIR__ . '/resources/lang' => base_path('resources/lang/vendor/acme'),
        ], 'lang');
    }

    /**
     * {@inheritdoc}
     *
     * @return mixed return this class itself
     */
    public function register()
    {
        # you can use $this->route to add new route

        require __DIR__ . '/app/routes.php';


        # link a new console command

        $this->console->add(new AcmeConsoleCommand);


        return $this;
    }
}
