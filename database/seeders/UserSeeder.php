<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // 5 authors
        User::factory()->count(5)->create([
            'type' => 'author',
            'password' => Hash::make('password'),
        ]);

        // 15 members
        User::factory()->count(15)->create([
            'type' => 'member',
            'password' => Hash::make('password'),
        ]);
    }
}
