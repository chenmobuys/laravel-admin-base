<?php

namespace Chenmobuys\AdminBase\Database\seeds;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(AdminMenuTableSeeder::class);

        $this->call(AreaTableSeeder::class);

    }
}
