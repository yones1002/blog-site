<?php

namespace App\Jobs;

use App\Models\Blog;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class RssJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public function __construct(public array $data) {}

    public function handle(): void
    {
        try {
            Blog::query()->create([
                'title' => $this->data['title'],
                'slug' => $this->data['slug'],
                'short_detail' => $this->data['short_detail'],
                'long_detail' => $this->data['long_detail'],
                'cover' => $this->data['cover'],
                'mini_cover' => $this->data['cover'],
                'type' => 'news',
                'status' => 'inactive',
                'lang' => 'fa',
                'share_time' => now(),
                'author_id' => 1,
                'rss_link' => $this->data['link'],
            ]);
        } catch (\Throwable $e) {
            Log::error('RSS_JOB_FAILED', [
                'error' => $e->getMessage(),
                'data' => $this->data,
            ]);
        }
    }
}
