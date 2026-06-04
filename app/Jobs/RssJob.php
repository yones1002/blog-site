<?php

namespace App\Jobs;

use App\Models\Blog;
use App\Models\Category;
use App\Models\User;
use App\Services\BlogService;
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
        if (Blog::query()->where('rss_link', $this->data['link'])->exists()) {
            return;
        }
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

            $authorId = User::query()->where('type', 'authors')->inRandomOrder()->first()?->id;

            BlogService::store($this->data,$imageName,$authorId,$category);

        } catch (\Throwable $e) {
            Log::error('RSS_JOB_FAILED', [
                'error' => $e->getMessage(),
                'data' => $this->data,
            ]);
        }
    }
}
