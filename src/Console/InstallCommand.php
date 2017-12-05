<?php

namespace Chenmobuys\AdminBase\Console;

use Illuminate\Console\Command;

class InstallCommand extends Command
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'chen:install';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Install the chen package';

    /**
     * Install directory.
     *
     * @var string
     */
    protected $directory = '';

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle()
    {
        //$this->call('vendor:publish',['--provider'=>'Encore\Admin\AdminServiceProvider']);
        //$this->call('vendor:publish',['--provider'=>'Chenmobuys\AdminBase\AdminBaseServiceProvider']);
        //$this->call('admin:install');

        $this->call('migrate:fresh');
        $this->call('db:seed', ['--class' => 'Chenmobuys\AdminBase\Database\seeds\DatabaseSeeder']);
    }


}
