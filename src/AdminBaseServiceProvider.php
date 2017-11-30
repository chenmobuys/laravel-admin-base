<?php

namespace Chenmobuys\AdminBase;


use Illuminate\Support\ServiceProvider;

class AdminBaseServiceProvider extends ServiceProvider
{
    /**
     * @var array
     */
    protected $commands = [
        'Chenmobuys\AdminBase\Console\InstallCommand',
    ];

    public function boot()
    {
        if (file_exists($routes = __DIR__.'/routes.php')) {
            $this->loadRoutesFrom($routes);
        }
    }

    public function register()
    {
        $this->commands($this->commands);
    }
}