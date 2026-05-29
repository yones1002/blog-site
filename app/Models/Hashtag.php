<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Hashtag extends Model
{
    use softDeletes;
    protected $table = 'hashtag';
    protected $guarded = [];

    public function blogs(): \Illuminate\Database\Eloquent\Relations\MorphToMany
    {
        return $this->morphedByMany(Blog::class, 'model', 'model_has_hashtag', 'hashtags_id', 'model_id');
    }
}
