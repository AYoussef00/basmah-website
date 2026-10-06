<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class AdminUserSeeder extends Seeder
{
    public function run(): void
    {
        User::query()->updateOrCreate(
            ['username' => 'admin'],
            [
                'name' => 'مدير بصمة',
                'email' => 'admin@basma.local',
                'password' => 'password',
            ],
        );
    }
}
