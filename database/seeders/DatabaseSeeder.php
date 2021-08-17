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
            // FeaturesSeeder::class,
            // ShopTypesSeeder::class,
            // UserSeeder::class,
            // DokanSeeder::class,
            // DokanUserSeeder::class,
            // CustomersSeeder::class,
            MechanicTableSeeder::class,
        ]);
    }
}
