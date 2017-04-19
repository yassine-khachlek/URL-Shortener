<?php

use Illuminate\Database\Seeder;

class DemoUrlsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (App\User::get() as $user) {
            factory(App\Url::class, random_int(0, Config::get('url.limit_per_user')))->create([
                'user_id' => $user->id,
            ]);
        }
    }
}
