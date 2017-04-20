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
        factory(App\User::class, 1)->create([
            'name' => 'Administrator',
            'email' => 'admin@example.com',
            'password' => bcrypt('demo'),
            'is_admin' => true,
        ]);

        factory(App\User::class, 1)->create([
            'name' => 'Demo',
            'email' => 'demo@example.com',
            'password' => bcrypt('demo'),
            'is_admin' => false,
        ]);

        factory(App\User::class, 3)->create([
            'password' => bcrypt('demo'),
            'is_admin' => false,
        ]);
    }
}
