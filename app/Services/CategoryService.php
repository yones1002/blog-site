<?php

namespace App\Services;

use App\Models\Category;

class CategoryService
{
    public static function store(array $data)
    {
        return Category::query()->create([
            'name' => $data['slug'],
            'fa_name' => $data['name'],
            'slug' => $data['slug'],
            'type' => Category::RSS_CATEGORY_ID,
        ]);
    }
}
