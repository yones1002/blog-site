<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentRequest;
use App\Models\Blog;
use App\Models\Comment;
use App\Services\CommentService;

class CommentController extends Controller
{
    public function __construct(private readonly CommentService $commentService)
    {

    }
    public function store(CommentRequest $request,$blogId): \Illuminate\Http\JsonResponse
    {
        $blog = Blog::query()->where('id',$blogId)->first();
        if(!$blog)
        {
            return response()->json([
                'message' => 'وبلاگ مورد نظر پیدا نشد.'
            ], 404);
        }

        $this->commentService->store(
            data:$request->validated(),
            blogId:$blog->id
        );

        return response()->json([
            'message' => 'نظر شما با موفقیت ثبت شد.'
        ]);
    }
}
