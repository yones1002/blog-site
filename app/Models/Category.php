<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    const string RSS_CATEGORY_ID = 'RssCategory';
    protected $table = 'categories';
    protected $fillable = [
        'name',
        'fa_name',
        'slug',
        'type',
        'description',
        'fa_description',
        'image',
        'parent_id',
    ];
    protected $casts = [
        'meta' => 'json',
    ];

    public function blogs(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Blog::class, 'category_id');
    }
}
