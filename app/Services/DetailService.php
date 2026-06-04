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
    /**
     * @param $blogId
     * @param $massage
     * @return int
     */
    public static final function updateSeo($blogId, $massage): int
    {
        return Blog::query()->where('id', $blogId)
            ->update([
                'seo' => $massage,
            ]);
    }

    /**
     * @param $blogId
     * @param $faq
     * @return int
     */
    public static function updateFaq($blogId, $faq): int
    {
        return Blog::query()->where('id', $blogId)
            ->update([
                'faq' => $faq,
            ]);
    }

    /**
     * @param $categoryId
     * @param $fa
     * @return int
     */
    public static function updateFaContent($categoryId, $fa): int
    {
        return Category::query()->where('id', $categoryId)
            ->update([
                'fa_description' => $fa,
            ]);
    }

    /**
     * @param $categoryId
     * @param $en
     * @return int
     */
    public static function updateEnContent($categoryId, $en): int
    {
        return Category::query()->where('id', $categoryId)
            ->update([
                'description' => $en,
            ]);
    }
}
