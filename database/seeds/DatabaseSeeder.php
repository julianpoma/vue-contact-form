<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        factory(App\DataPlan::class, 7)->create();

        \App\User::create([
            'email' => 'admin@admin.com',
            'name' => 'Admin',
            'password' => '$2y$10$sjbOBl4ic74tW1QlMNnJVeGW59iMRvVT8UaJZybPWgAaSyyZuvq7u',
        ]);
    }
}
