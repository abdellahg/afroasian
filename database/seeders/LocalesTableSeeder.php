<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LocalesTableSeeder extends Seeder
{
    public function run(): void
    {
        $now = date('Y-m-d H:i:s');
        $locales = [
            ['code' => 'en', 'name' => 'English',    'ltr' => true,  'created_at' => $now, 'updated_at' => $now],
            ['code' => 'es', 'name' => 'Spanish',    'ltr' => true,  'created_at' => $now, 'updated_at' => $now],
            ['code' => 'pt', 'name' => 'Portuguese', 'ltr' => true,  'created_at' => $now, 'updated_at' => $now],
        ];

        foreach ($locales as $loc) {
            DB::table('locales')->updateOrInsert(['code' => $loc['code']], $loc);
        }
    }
}
