<?php

namespace Chenmobuys\AdminBase\Console;

use Illuminate\Console\Command;

class FreshCommand extends Command
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'chen:fresh';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Fresh the chen package';

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
        $this->call('migrate:fresh');
        $this->call('db:seed');
    }


}
