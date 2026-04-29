<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class FilamentAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::query()->updateOrCreate(
            ['email' => 'jjonah322@gmail.com'],
            [
                'name' => 'younes',
                'password' => Hash::make('Y00nes81'),
            ]
        );
    }
}
