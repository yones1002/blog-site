<?php

namespace App\Services;

use App\Models\Category;
use Illuminate\Database\Eloquent\Model;

class CategoryService
{
    /**
     * @param array $data
     * @return Category|Model
     */
    public static function store(array $data): Model|Category
    {
        return Category::query()->create([
            'name' => $data['slug'],
            'fa_name' => $data['name'],
            'slug' => $data['slug'],
            'type' => Category::RSS_CATEGORY_ID,
        ]);
    }
}
