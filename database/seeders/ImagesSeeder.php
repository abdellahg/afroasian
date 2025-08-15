<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ImagesSeeder extends Seeder
{
    public function run(): void
    {
        $now = now();
        $itemIds = DB::table('items')->pluck('id')->all();
        if (empty($itemIds)) return;

        $images = [];
        foreach ($itemIds as $itemId) {
            $images[] = ['img_name' => "item{$itemId}_1.jpg", 'item_id' => $itemId, 'created_at' => $now, 'updated_at' => $now];
            $images[] = ['img_name' => "item{$itemId}_2.jpg", 'item_id' => $itemId, 'created_at' => $now, 'updated_at' => $now];
        }

        foreach ($images as $img) {
            DB::table('images')->updateOrInsert(
                ['item_id' => $img['item_id'], 'img_name' => $img['img_name']],
                $img
            );
        }
    }
}
