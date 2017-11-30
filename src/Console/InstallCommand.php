<?php

namespace Encore\AdminBase\Console;

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
        $this->call('admin:install');
    }


}
