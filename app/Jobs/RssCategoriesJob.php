<?php

namespace App\Jobs;

use App\Models\Blog;
use App\Models\Category;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class RssCategoriesJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public function __construct(public array $data) {}

    public function handle(): void
    {
        try {
            Category::query()->create([
                'name' => $this->data['slug'],
                'fa_name' => $this->data['name'],
                'slug' => $this->data['slug'],
                'type' => Category::RSS_CATEGORY_ID,
            ]);
        } catch (\Throwable $e) {
            Log::error('RSS_CATEGORY_JOB_FAILED', [
                'error' => $e->getMessage(),
                'data' => $this->data,
            ]);
        }
    }
}
