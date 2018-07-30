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
        factory(App\User::class, 2)->create();
        factory(App\ServiceRequest::class, 400)->create();
        App\User::create([
            'name' => 'Neucoas',
            'email' => 'admin@admin.com',
            'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        ]);
    }
}
