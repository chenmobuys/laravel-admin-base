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

    }

    public function register()
    {
        $this->commands($this->commands);
    }
}