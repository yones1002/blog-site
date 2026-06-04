<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentRequest;
use App\Models\Blog;
use App\Models\Comment;
use App\Services\CommentService;
use Illuminate\Http\JsonResponse;

class CommentController extends Controller
{
    /**
     * @param CommentService $commentService
     */
    public function __construct(private readonly CommentService $commentService)
    {

    }

    /**
     * @param CommentRequest $request
     * @param $blogId
     * @return JsonResponse
     */
    public function store(CommentRequest $request,$blogId): JsonResponse
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
