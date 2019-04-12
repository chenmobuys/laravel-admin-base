<?php

namespace Chenmobuys\AdminBase;


use Illuminate\Support\ServiceProvider;

class AdminBaseServiceProvider extends ServiceProvider
{
    /**
     * @var array
     */
    protected $commands = [
        'Chenmobuys\AdminBase\Console\PublishCommand',
        'Chenmobuys\AdminBase\Console\InstallCommand',
        'Chenmobuys\AdminBase\Console\UninstallCommand',
        'Chenmobuys\AdminBase\Console\FreshCommand',
    ];

    /**
     * The application's route middleware.
     *
     * @var array
     */
    protected $routeMiddleware = [
        'chen.bootstrap'   => \Chenmobuys\AdminBase\Middleware\Bootstrap::class,
    ];

    /**
     * The application's route middleware groups.
     *
     * @var array
     */
    protected $middlewareGroups = [
        'chen' => [
            'chen.bootstrap',
        ],
    ];

    public function boot()
    {
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'chen');

        if (file_exists($routes = __DIR__.'/routes.php')) {
            $this->loadRoutesFrom($routes);
        }

        if ($this->app->runningInConsole()) {
            //admin:install
            $this->publishes([__DIR__.'/../config' => config_path()], 'laravel-admin-config');
            $this->publishes([__DIR__.'/../resources/lang' => resource_path('lang')], 'laravel-admin-lang');
//            $this->publishes([__DIR__.'/../resources/views' => resource_path('views/admin')],           'laravel-admin-views');
            $this->publishes([__DIR__.'/../database/migrations' => database_path('migrations')], 'laravel-admin-migrations');
            $this->publishes([__DIR__.'/../resources/assets' => public_path('vendor/chen')], 'laravel-admin-assets');
        }
    }

    public function register()
    {
        $this->registerRouteMiddleware();

        $this->commands($this->commands);
    }

    /**
     * Register the route middleware.
     *
     * @return void
     */
    protected function registerRouteMiddleware()
    {
        // register route middleware.
        foreach ($this->routeMiddleware as $key => $middleware) {
            app('router')->aliasMiddleware($key, $middleware);
        }

        // register middleware group.
        foreach ($this->middlewareGroups as $key => $middleware) {
            app('router')->middlewareGroup($key, $middleware);
        }
    }
}