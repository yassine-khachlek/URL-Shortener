<?php

use Illuminate\Database\Seeder;

class DemoUserAgentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Fake user agent
        factory(App\UserAgent::class, random_int(32, 128))->create([

        ]);
    }
}
