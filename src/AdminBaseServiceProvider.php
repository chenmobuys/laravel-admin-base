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
        'Chenmobuys\AdminBase\Console\UninstallCommand',
    ];

    public function boot()
    {
        if (file_exists($routes = __DIR__.'/routes.php')) {
            $this->loadRoutesFrom($routes);
        }

        if ($this->app->runningInConsole()) {
            $this->publishes([__DIR__.'/Database/migrations' => database_path('migrations')], 'laravel-admin-migrations');
        }
    }

    public function register()
    {
        $this->commands($this->commands);
    }
}