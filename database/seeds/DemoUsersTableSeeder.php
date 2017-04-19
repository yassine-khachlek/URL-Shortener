<?php

use Illuminate\Database\Seeder;

class DemoUsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\User::class, 3)->create([
            'password' => 'demo',
            'is_admin' => false,
        ]);
    }
}
