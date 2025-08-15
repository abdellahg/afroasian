<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            // Core lookup and user
            RolesTableSeeder::class,
            LocalesTableSeeder::class,
            AdminUserSeeder::class,

            // Domain data required by items
            CategoriesSeeder::class,
            DestinationsSeeder::class,

            // Items and relations
            ItemsSeeder::class,
            ImagesSeeder::class,
            ReservationsSeeder::class,
            PaymentsSeeder::class,
            ReviewsSeeder::class,

            // Translations depend on base rows existing
            TranslationSeeder::class,

            // Other seeders
            HomesettingsSeeder::class,
        ]);
    }
}
