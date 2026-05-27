<?php

namespace App\Services;

use App\Models\Blog;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

/**
 * Class SeoService
 * @package app\Service
 *
 * Service for handling operations related to comments.
 */
class SeoService
{
    public static final function updateSeo($blogId, $massage): int
    {
        return Blog::query()->where('id', $blogId)
            ->update([
                'seo' => $massage,
            ]);
    }

    public static function updateFaq($blogId, $faq)
    {
        return Blog::query()->where('id', $blogId)
            ->update([
                'faq' => $faq,
            ]);
    }
}
