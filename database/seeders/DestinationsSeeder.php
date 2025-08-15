<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DestinationsSeeder extends Seeder
{
    public function run(): void
    {
        $now = now();
        $rows = [
            ['id' => 1, 'order' => 1, 'active' => true,  'foreign' => false],
            ['id' => 2, 'order' => 2, 'active' => true,  'foreign' => false],
            ['id' => 3, 'order' => 3, 'active' => true,  'foreign' => true],
            ['id' => 4, 'order' => 4, 'active' => false, 'foreign' => true],
        ];
        foreach ($rows as $r) {
            DB::table('destinations')->updateOrInsert(
                ['id' => $r['id']],
                [
                    'order'      => $r['order'],
                    'active'     => $r['active'],
                    'foreign'    => $r['foreign'],
                    'created_at' => $now,
                    'updated_at' => $now,
                ]
            );
        }
    }
}
