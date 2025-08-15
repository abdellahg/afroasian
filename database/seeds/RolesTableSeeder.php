<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolesTableSeeder extends Seeder
{
    public function run()
    {
        $now = date('Y-m-d H:i:s');
        $roles = [
            ['type' => 'admin', 'created_at' => $now, 'updated_at' => $now],
            ['type' => 'user',  'created_at' => $now, 'updated_at' => $now],
            ['type' => 'agent', 'created_at' => $now, 'updated_at' => $now],
        ];

        foreach ($roles as $role) {
            DB::table('roles')->updateOrInsert(['type' => $role['type']], $role);
        }
    }
}
