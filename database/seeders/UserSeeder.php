<?php

namespace Database\Seeders;

use App\Models\Blog;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $authors = [
            'علی رضایی',
            'محمد کریمی',
            'سینا احمدی',
            'حسین حسینی',
            'امیر جعفری',
        ];

        $members = [
            'زهرا محمدی',
            'مریم حسینی',
            'فاطمه احمدی',
            'رضا کریمی',
            'نرگس رضایی',
            'امیرحسین موسوی',
            'سارا جعفری',
            'علیرضا رحیمی',
            'ندا محمدپور',
            'حمید کاظمی',
            'پریسا صادقی',
            'مجید عباسی',
            'یاسمن احمدزاده',
            'محسن کریمی',
            'لیلا محمدی',
        ];

        $avatar = fn () => 'https://api.dicebear.com/7.x/avataaars/svg?seed=' . uniqid();

        $authorUsers = [];

        foreach ($authors as $name) {
            $authorUsers[] = User::create([
                'name' => $name,
                'type' => 'author',
                'email' => fake()->unique()->safeEmail(),
                'password' => Hash::make('password'),
                'avatar' => $avatar(),
            ]);
        }

        foreach ($members as $name) {
            User::create([
                'name' => $name,
                'type' => 'member',
                'email' => fake()->unique()->safeEmail(),
                'password' => Hash::make('password'),
                'avatar' => $avatar(),
            ]);
        }

        // وصل کردن بلاگ‌ها به نویسنده‌ها
        $blogs = Blog::all();

        foreach ($blogs as $blog) {
            $blog->update([
                'author_id' => $authorUsers[array_rand($authorUsers)]->id,
            ]);
        }
    }
}
