<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $users = [
            [
                'name' => 'Super Admin',
                'email' => 'superadmin@schoolcms.test',
                'password' => 'password',
                'role' => 'super_admin',
            ],
            [
                'name' => 'Admin',
                'email' => 'admin@schoolcms.test',
                'password' => 'password',
                'role' => 'admin',
            ],
            [
                'name' => 'Content Editor',
                'email' => 'editor@schoolcms.test',
                'password' => 'password',
                'role' => 'content_editor',
            ],
        ];

        foreach ($users as $data) {
            $role = $data['role'];
            unset($data['role']);

            $user = User::firstOrCreate(
                ['email' => $data['email']],
                $data,
            );

            if (!$user->hasRole($role)) {
                $user->assignRole($role);
            }

            $this->command->info("{$role} user created: {$user->email}");
        }
    }
}
