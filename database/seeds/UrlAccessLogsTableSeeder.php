<?php

use Illuminate\Database\Seeder;

class UrlAccessLogsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Fake user agent
        factory(App\UrlAccessLog::class, random_int(64, 256))->create([
            
        ])->each(function ($log) {
            
            $log->url->increment('views_count');

        });
    }
}
