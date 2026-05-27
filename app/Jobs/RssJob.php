<?php

namespace App\Jobs;

use App\Models\Blog;
use App\Models\Category;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class RssJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public function __construct(public array $data) {}

    public function handle(): void
    {
        try {
            $category = Category::query()
                ->where('fa_name', $this->data['category'] ?? null)
                ->first();

            $imageName = null;

            if ($this->data['cover']) {

                $response = Http::get($this->data['cover']);

                if ($response->successful()) {

                    $extension = pathinfo(
                        parse_url($this->data['cover'], PHP_URL_PATH),
                        PATHINFO_EXTENSION
                    );

                    $imageName = Str::ulid() . '.' . $extension;

                    Storage::disk('public')->put(
                        'blogs/' . $imageName,
                        $response->body()
                    );
                }
            }

            Blog::query()->create([
                'title' => $this->data['title'],
                'slug' => $this->data['slug'],
                'short_detail' => $this->data['short_detail'],
                'long_detail' => $this->data['long_detail'],
                'cover' => $imageName,
                'mini_cover' => $imageName,
                'type' => 'news',
                'status' => 'inactive',
                'lang' => 'fa',
                'share_time' => now(),
                'author_id' => 1,
                'rss_link' => $this->data['link'],

                'category_id' => $category?->id,
            ]);

        } catch (\Throwable $e) {
            Log::error('RSS_JOB_FAILED', [
                'error' => $e->getMessage(),
                'data' => $this->data,
            ]);
        }
    }
}
