<?php

namespace Chenmobuys\AdminBase\Console;

use Illuminate\Console\Command;

class PublishCommand extends Command
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'chen:publish';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Publish the chen package';

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
        $this->call('vendor:publish', ['--provider' => \Chenmobuys\AdminBase\AdminBaseServiceProvider::class]);
    }


}
