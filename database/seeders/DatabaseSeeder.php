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
        $this->call([
            EbookSeeder::class,
            GenderSeeder::class,
            RoleSeeder::class
        ]);
    }
}
