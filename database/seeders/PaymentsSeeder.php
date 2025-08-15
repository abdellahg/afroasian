<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PaymentsSeeder extends Seeder
{
    public function run(): void
    {
        $now = now();
        $user = DB::table('users')->where('email', 'admin@example.com')->first();
        $userId = $user->id ?? null;

        $reservations = DB::table('reservations')->select('id', 'deposit_amount')->get();
        if ($reservations->isEmpty()) return;

        $i = 1;
        foreach ($reservations as $res) {
            $rows = [
                [
                    'id' => $i++,
                    'user_id' => $userId,
                    'reservation_id' => $res->id,
                    'amount' => $res->deposit_amount ?? 50.00,
                    'status' => 'paid',
                    'notes' => 'Deposit payment',
                    'created_at' => $now,
                    'updated_at' => $now,
                ],
            ];
            foreach ($rows as $r) {
                DB::table('payments')->updateOrInsert(['id' => $r['id']], $r);
            }
        }
    }
}
