<?php

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
        $this->call(CountriesTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(UrlsTableSeeder::class);
        $this->call(UserAgentsTableSeeder::class);
        $this->call(UrlAccessLogsTableSeeder::class);
    }
}
