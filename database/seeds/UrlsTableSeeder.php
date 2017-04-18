<?php

use Illuminate\Database\Seeder;

class UrlsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
	    factory(App\Url::class, random_int(100, 200))->create([
	    	
	    ]);
    }
}
