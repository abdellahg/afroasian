<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ItemsSeeder extends Seeder
{
    public function run(): void
    {
        $now = now();

        // fetch any existing category/destination ids
        $catIds = DB::table('categories')->pluck('id')->all();
        if (empty($catIds)) {
            // ensure at least one category exists (id=1 from CategoriesSeeder)
            $catIds = [1];
        }
        $destIds = DB::table('destinations')->pluck('id')->all();
        if (empty($destIds)) {
            $destIds = [1,2];
        }

        $rows = [
            [
                'id' => 1,
                'active' => true,
                'order' => 1,
                'category_id' => $catIds[0] ?? 1,
                // destination_id is TEXT and stores CSV of ids per schema change
                'destination_id' => implode(',', array_slice($destIds, 0, 2)),
                'days' => 3,
                'price' => 499.00,
                'special_price' => 449.00,
                'sale_text' => 'Summer Sale',
                'sale_percentage' => 10,
                'single_price' => 549.00,
                'double_price' => 499.00,
                'triple_price' => 479.00,
                'prices_type' => 1,
                'latitude' => -1.286389,
                'longitude' => 36.817223,
                'primary_image' => 'item1.jpg',
            ],
            [
                'id' => 2,
                'active' => true,
                'order' => 2,
                'category_id' => $catIds[1] ?? $catIds[0] ?? 1,
                'destination_id' => (string)($destIds[0] ?? 1),
                'days' => 5,
                'price' => 799.00,
                'special_price' => null,
                'sale_text' => null,
                'sale_percentage' => null,
                'double_price2' => 759.00,
                'triple_price2' => 729.00,
                'prices_type' => 2,
                'latitude' => -3.386925,
                'longitude' => 36.682995,
                'primary_image' => 'item2.jpg',
            ],
            [
                'id' => 3,
                'active' => true,
                'order' => 3,
                'category_id' => $catIds[2] ?? $catIds[0] ?? 1,
                'destination_id' => implode(',', array_slice($destIds, 1, 2)),
                'days' => 1,
                'price' => 99.00,
                'person1_price' => 99.00,
                'person2_3_price' => 89.00,
                'person4_6_price' => 79.00,
                'person7_10_price' => 69.00,
                'prices_type' => 3,
                'latitude' => -26.204103,
                'longitude' => 28.047304,
                'primary_image' => 'item3.jpg',
            ],
            [
                'id' => 4,
                'active' => false,
                'order' => 4,
                'category_id' => $catIds[0] ?? 1,
                'destination_id' => (string)($destIds[2] ?? ($destIds[0] ?? 1)),
                'days' => 7,
                'price' => 1299.00,
                'special_price' => 1199.00,
                'sale_text' => 'Limited Time',
                'sale_percentage' => 8,
                'prices_type' => 1,
                'latitude' => 30.044420,
                'longitude' => 31.235712,
                'primary_image' => 'item4.jpg',
            ],
            [
                'id' => 5,
                'active' => true,
                'order' => 5,
                'category_id' => $catIds[0] ?? 1,
                'destination_id' => (string)($destIds[3] ?? ($destIds[0] ?? 1)),
                'days' => 2,
                'price' => 299.00,
                'prices_type' => 1,
                'latitude' => 6.524379,
                'longitude' => 3.379206,
                'primary_image' => 'item5.jpg',
            ],
        ];

        foreach ($rows as $r) {
            $data = array_merge($r, [
                'created_at' => $now,
                'updated_at' => $now,
            ]);
            DB::table('items')->updateOrInsert(['id' => $r['id']], $data);
        }
    }
}
