<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Hashtag extends Model
{
    use SoftDeletes;

    protected $table = 'hashtag';
    protected $guarded = [];

    public function blogs(): BelongsToMany
    {
        return $this->morphedByMany(Blog::class, 'model', 'model_has_hashtag', 'hashtags_id', 'model_id');
    }

    public function scopeActive($query)
    {
        return $query->where('status', 'active');
    }
}
