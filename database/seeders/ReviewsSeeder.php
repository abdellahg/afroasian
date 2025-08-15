<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ReviewsSeeder extends Seeder
{
    public function run(): void
    {
        $now = now();

        $user = DB::table('users')->where('email', 'admin@example.com')->first();
        $userId = $user->id ?? null;

        $itemIds = DB::table('items')->pluck('id')->all();
        if (empty($itemIds)) return;

        $id = 1;
        foreach ($itemIds as $itemId) {
            $reviews = [
                [
                    'id' => $id++,
                    'user_id' => $userId,
                    'item_id' => $itemId,
                    'rating' => 5,
                    'comment' => 'Amazing experience! Highly recommended.',
                    'approved' => true,
                    'created_at' => $now,
                    'updated_at' => $now,
                ],
                [
                    'id' => $id++,
                    'user_id' => $userId,
                    'item_id' => $itemId,
                    'rating' => 4,
                    'comment' => 'Very good overall with minor issues.',
                    'approved' => true,
                    'created_at' => $now,
                    'updated_at' => $now,
                ],
            ];
            foreach ($reviews as $r) {
                DB::table('reviews')->updateOrInsert(['id' => $r['id']], $r);
            }
        }
    }
}
