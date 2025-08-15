<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class HomesettingsSeeder extends Seeder
{
    public function run(): void
    {
        $now = now();
        $rows = [
            ['slug' => 'home_slider', 'name_setting' => 'home_slider', 'type' => null, 'value' => ''],
            ['slug' => 'home_most_popular_tours', 'name_setting' => 'home_most_popular_tours', 'type' => null, 'value' => ''],
            ['slug' => 'home_best_offers', 'name_setting' => 'home_best_offers', 'type' => null, 'value' => ''],
            ['slug' => 'home_other_destinations', 'name_setting' => 'home_other_destinations', 'type' => null, 'value' => ''],
        ];

        // Add a few placeholder service and service_title rows so queries return collections
        for ($i = 1; $i <= 3; $i++) {
            $rows[] = ['slug' => "service_$i", 'name_setting' => "service_$i", 'type' => 'service', 'value' => ''];
            $rows[] = ['slug' => "service_title_$i", 'name_setting' => "service_title_$i", 'type' => 'service_title', 'value' => ''];
        }

        foreach ($rows as $r) {
            $exists = DB::table('homesettings')
                ->where('name_setting', $r['name_setting'])
                ->when($r['type'] !== null, fn($q) => $q->where('type', $r['type']))
                ->exists();
            if (!$exists) {
                DB::table('homesettings')->insert([
                    'slug' => $r['slug'],
                    'name_setting' => $r['name_setting'],
                    'type' => $r['type'],
                    'value' => $r['value'],
                    'created_at' => $now,
                    'updated_at' => $now,
                ]);
            }
        }
    }
}
