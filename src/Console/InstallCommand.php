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
        if (!is_file(config_path('admin.php'))){
            $this->error('please run "php artisan chen:publish"');return;
        }
        $this->call('migrate:fresh');
        $this->call('admin:install');
        $this->call('db:seed', ['--class' => 'Chenmobuys\AdminBase\Database\seeds\DatabaseSeeder']);
    }
}
