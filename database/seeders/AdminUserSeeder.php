<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;

class AdminUserSeeder extends Seeder
{
    public function run(): void
    {
        $now = date('Y-m-d H:i:s');

        $email = 'admin@example.com';
        $data = [
            'name'       => 'Administrator',
            'email'      => $email,
            'password'   => Hash::make('password'),
            'admin'      => true,
            'role'       => 'admin',
            'gender'     => 'm',
            'created_at' => $now,
            'updated_at' => $now,
        ];

        // Ensure account is active if a status column exists
        if (Schema::hasColumn('users', 'status')) {
            $data['status'] = 1;
        }

        DB::table('users')->updateOrInsert(['email' => $email], $data);
    }
}
