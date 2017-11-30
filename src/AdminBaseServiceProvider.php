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

        if ($this->app->runningInConsole()) {
            $this->publishes([__DIR__.'/Database/migrations' => database_path('migrations')], 'laravel-admin-migrations');
            $this->publishes([__DIR__.'/Database/factories' => database_path('factories')], 'laravel-admin-factories');
        }
    }

    public function register()
    {
        $this->commands($this->commands);
    }
}