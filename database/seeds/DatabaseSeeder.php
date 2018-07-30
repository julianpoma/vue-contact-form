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
    }
}
