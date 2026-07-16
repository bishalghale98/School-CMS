<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            SettingSeeder::class,
            PageSeeder::class,
            NoticeCategorySeeder::class,
            FaqSeeder::class,
        ]);

        $this->call([
            RoleSeeder::class,
        ]);

        $user = User::firstOrCreate(
            ['email' => 'admin@schoolcms.test'],
            [
                'name' => 'Admin',
                'email' => 'admin@schoolcms.test',
                'password' => bcrypt('password'),
            ]
        );

        if (!$user->hasRole('super_admin')) {
            $user->assignRole('super_admin');
        }
    }
}
