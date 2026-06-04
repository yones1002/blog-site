<?php

namespace App\Services;

use App\Models\Blog;

class BlogService
{
    public static function store($data,$imageName,$authorId,$category): Blog
    {
        return Blog::query()->create([
            'title' => $data['title'],
            'slug' => $data['slug'],
            'short_detail' => $data['short_detail'],
            'long_detail' => $data['long_detail'],
            'cover' => $imageName,
            'mini_cover' => $imageName,
            'type' => 'news',
            'status' => 'inactive',
            'lang' => 'fa',
            'share_time' => now(),
            'author_id' => $authorId,
            'rss_link' => $data['link'],
            'category_id' => $category?->id,
        ]);
    }
}
