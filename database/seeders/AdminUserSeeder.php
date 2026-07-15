<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class AdminUserSeeder extends Seeder
{
    public function run(): void
    {
        $user = User::updateOrCreate(
            ['email' => 'admin@schoolcms.test'],
            [
                'name' => 'Admin',
                'password' => Hash::make('password'),
            ]
        );

        $role = Role::firstOrCreate(['name' => 'super_admin', 'guard_name' => 'web']);

        if (!$user->hasRole($role)) {
            $user->assignRole($role);
        }

        $this->command->info("Admin user created: {$user->id} with super_admin role");
    }
}
