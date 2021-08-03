<?php

namespace Database\Seeders;

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
        $this->call(UserSeeder::class);
        $this->command->info("User Seeder run!");

        $this->call(FormSeeder::class);
        $this->command->info("Form Seeder run!");
    }
}
