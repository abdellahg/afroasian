<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\User;

class PromoteAdmin extends Command
{
    protected $signature = 'user:promote-admin {email : The email of the user} {--role=admin : Role to assign}';

    protected $description = 'Promote an existing user to admin (sets users.admin=true and users.role=admin by default).';

    public function handle(): int
    {
        $email = $this->argument('email');
        $role = (string)$this->option('role');

        $user = User::where('email', $email)->first();
        if (!$user) {
            $this->error("User not found for email: {$email}");
            return self::FAILURE;
        }

        $user->admin = true;
        $user->role = $role ?: 'admin';
        $user->save();

        $this->info("User {$user->email} promoted to admin (role={$user->role}).");
        return self::SUCCESS;
    }
}
