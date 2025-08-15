<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ReservationsSeeder extends Seeder
{
    public function run(): void
    {
        $now = now();

        $adminUser = DB::table('users')->where('email', 'admin@example.com')->first();
        $userId = $adminUser->id ?? null;

        $itemIds = DB::table('items')->pluck('id')->all();
        if (empty($itemIds)) return;

        $rows = [];
        $i = 1;
        foreach ($itemIds as $itemId) {
            $arrival = now()->addDays($i);
            $depart = (clone $arrival)->addDays(2);
            $rows[] = [
                'id' => $i,
                'user_id' => $userId,
                'item_id' => $itemId,
                'arrivaldate' => $arrival->toDateString(),
                'depaturedate' => $depart->toDateString(),
                'persons' => 2,
                'childs' => 0,
                'total_amount' => 200 + ($i * 10),
                'deposit_amount' => 50 + ($i * 5),
                'total_paid' => 0,
                'deposit_paid' => 0,
                'status' => 'pending',
                'user_notes' => null,
                'agent_notes' => null,
                'cancel_reason' => null,
                'created_at' => $now,
                'updated_at' => $now,
            ];
            $i++;
        }

        foreach ($rows as $r) {
            DB::table('reservations')->updateOrInsert(['id' => $r['id']], $r);
        }
    }
}
