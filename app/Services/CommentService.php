<?php

namespace App\Services;

use App\Models\Blog;
use App\Models\Comment;

class CommentService
{
    public function store(array $data,int $blogId): Comment
    {
        return Comment::query()->create([
            'name' => $data['name'],
            'email' => $data['email'],
            'content' => $data['comment'],
            'model_id' => $blogId,
            'model_type' => Blog::class,
        ]);
    }
}
