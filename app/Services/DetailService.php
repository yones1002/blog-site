<?php

namespace App\Services;

use App\Models\Blog;
use App\Models\Category;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

/**
 * Class SeoService
 * @package app\Service
 *
 * Service for handling operations related to comments.
 */
class DetailService
{
    public static final function updateSeo($blogId, $massage): int
    {
        return Blog::query()->where('id', $blogId)
            ->update([
                'seo' => $massage,
            ]);
    }

    public static function updateFaq($blogId, $faq): int
    {
        return Blog::query()->where('id', $blogId)
            ->update([
                'faq' => $faq,
            ]);
    }

    public static function updateFaContent($categoryId, $fa): int
    {
        return Category::query()->where('id', $categoryId)
            ->update([
                'fa_description' => $fa,
            ]);
    }
    public static function updateEnContent($categoryId, $en): int
    {
        return Category::query()->where('id', $categoryId)
            ->update([
                'description' => $en,
            ]);
    }
}
