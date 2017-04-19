<?php

use Illuminate\Database\Seeder;

class DemoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$this->call(DemoUsersTableSeeder::class);
        $this->call(DemoUrlsTableSeeder::class);
        $this->call(DemoUserAgentsTableSeeder::class);
        $this->call(DemoUrlAccessLogsTableSeeder::class);
    }
}
