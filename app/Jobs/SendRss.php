<?php

namespace App\Jobs;

use App\Mail\RssMail;
use App\Models\Blog;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class SendRss implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public int $blogId;

    public function __construct(int $blogId)
    {
        $this->blogId = $blogId;
    }

    /**
     * @return void
     */
    public function handle(): void
    {
        $users = User::query()->where('type','admin')->get();

        $blog = Blog::query()
            ->where('id', $this->blogId)
            ->where('status','active')->latest()
            ->first();

        if (!$blog) {
            Log::warning('BLOG_SEND_RSS_NOT_FOUND', [
                'blog_id' => $this->blogId
            ]);
            return;
        }

        foreach ($users as $user)
        {
            try{
                Mail::to($user->email)->queue(
                    new RssMail($blog, $user)
                );
            } catch (\Exception $e) {
                Log::error($e->getMessage());
            }
        }
    }
}
