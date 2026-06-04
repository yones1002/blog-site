<?php

namespace Database\Seeders;

use App\Models\Blog;
use Illuminate\Database\Seeder;
use App\Models\Hashtag;
use Illuminate\Support\Facades\DB;

class HashtagSeeder extends Seeder
{
    public function run(): void
    {
        $hashtags = [
            [
                'name' => 'politics',
                'fa_name' => 'سیاست',
                'slug' => 'politics',
                'status' => 'active',
                'image' => 'https://picsum.photos/seed/politics/300/300',
                'fa_description' => 'این هشتگ مربوط به اخبار و تحلیل‌های سیاسی داخلی و بین‌المللی است. شامل تصمیمات دولت‌ها و روابط کشورها می‌شود.'
            ],
            [
                'name' => 'war',
                'fa_name' => 'جنگ',
                'slug' => 'war',
                'status' => 'active',
                'image' => 'https://picsum.photos/seed/war/300/300',
                'fa_description' => 'پوشش اخبار جنگ‌ها، درگیری‌های نظامی و عملیات‌های امنیتی در مناطق مختلف جهان.'
            ],
            [
                'name' => 'economy',
                'fa_name' => 'اقتصاد',
                'slug' => 'economy',
                'status' => 'active',
                'image' => 'https://picsum.photos/seed/economy/300/300',
                'fa_description' => 'اخبار اقتصادی، بازارهای مالی، نرخ ارز و تحلیل‌های اقتصادی جهانی.'
            ],
            [
                'name' => 'middle-east',
                'fa_name' => 'خاورمیانه',
                'slug' => 'middle-east',
                'status' => 'active',
                'image' => 'https://picsum.photos/seed/middle-east/300/300',
                'fa_description' => 'اخبار مربوط به کشورهای خاورمیانه و تحولات منطقه‌ای.'
            ],
            [
                'name' => 'world',
                'fa_name' => 'جهان',
                'slug' => 'world',
                'status' => 'active',
                'image' => 'https://picsum.photos/seed/world/300/300',
                'fa_description' => 'اخبار بین‌المللی و رویدادهای مهم جهانی.'
            ],
            [
                'name' => 'security',
                'fa_name' => 'امنیت',
                'slug' => 'security',
                'status' => 'active',
                'image' => 'https://picsum.photos/seed/security/300/300',
                'fa_description' => 'اخبار امنیتی، تهدیدات و عملیات ضد تروریسم.'
            ],
            [
                'name' => 'diplomacy',
                'fa_name' => 'دیپلماسی',
                'slug' => 'diplomacy',
                'status' => 'active',
                'image' => 'https://picsum.photos/seed/diplomacy/300/300',
                'fa_description' => 'روابط دیپلماتیک، مذاکرات و توافق‌های بین کشورها.'
            ],
            [
                'name' => 'usa',
                'fa_name' => 'آمریکا',
                'slug' => 'usa',
                'status' => 'active',
                'image' => 'https://picsum.photos/seed/usa/300/300',
                'fa_description' => 'اخبار مربوط به ایالات متحده آمریکا.'
            ],
            [
                'name' => 'iran',
                'fa_name' => 'ایران',
                'slug' => 'iran',
                'status' => 'active',
                'image' => 'https://picsum.photos/seed/iran/300/300',
                'fa_description' => 'اخبار مربوط به ایران در حوزه‌های مختلف.'
            ],
            [
                'name' => 'israel',
                'fa_name' => 'اسرائیل',
                'slug' => 'israel',
                'status' => 'active',
                'image' => 'https://picsum.photos/seed/israel/300/300',
                'fa_description' => 'اخبار مربوط به اسرائیل و تحولات منطقه‌ای.'
            ],
        ];

        $blog = Blog::query()->get();
        foreach ($hashtags as $tag) {
            $new = Hashtag::firstOrCreate(
                ['slug' => $tag['slug']],
                $tag
            );
            foreach ($blog as $item) {
                DB::table('model_has_hashtag')->insertOrIgnore([
                    'hashtags_id' => $new->id,
                    'model_type' => Blog::class,
                    'model_id' => $item->id,
                ]);
            }
        }
    }
}
