<?php

declare(strict_types=1);

namespace Database\Seeders;

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
            RoleSeeder::class,
            UserSeeder::class,
        ]);
    }
}
