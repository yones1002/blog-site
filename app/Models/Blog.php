<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;

class Blog extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'title',
        'slug',
        'type',
        'short_detail',
        'parent_id',
        'long_detail',
        'link',
        'cover',
        'mini_cover',
        'seo',
        'time',
        'status',
        'show',
        'faq',
        'created_by',
        'category_id',
        'view',
        'likes',
        'share_time',
        'videos',
        'lang',
        'author_id',
        'rss_link',
    ];

    protected $casts = [
        'seo' => 'array',
        'faq' => 'array',
        'link' => 'array',
    ];

    public function category(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class, 'author_id');
    }
    public function scopeActive($query)
    {
        return $query->where('status', 'active');
    }

    public function getCoverUrlAttribute(): ?string
    {
        if (!$this->cover) {
            return null;
        }

        return Storage::disk('public')->url('blogs/' . $this->cover);
    }
}
