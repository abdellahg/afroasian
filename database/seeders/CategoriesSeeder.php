<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesSeeder extends Seeder
{
    public function run(): void
    {
        $now = now();
        $rows = [
            ['id' => 1, 'parent_id' => 0, 'active' => true,  'order' => 1],
            ['id' => 2, 'parent_id' => 0, 'active' => true,  'order' => 2],
            ['id' => 3, 'parent_id' => 0, 'active' => true,  'order' => 3],
            ['id' => 4, 'parent_id' => 1, 'active' => true,  'order' => 1],
            ['id' => 5, 'parent_id' => 2, 'active' => false, 'order' => 1],
        ];
        foreach ($rows as $r) {
            DB::table('categories')->updateOrInsert(
                ['id' => $r['id']],
                [
                    'parent_id' => $r['parent_id'],
                    'active'    => $r['active'],
                    'order'     => $r['order'],
                    'created_at'=> $now,
                    'updated_at'=> $now,
                ]
            );
        }
    }
}
