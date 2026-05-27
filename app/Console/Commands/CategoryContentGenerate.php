<?php

namespace App\Console\Commands;

use App\Actions\SocialDetailCategoryAction;
use App\Models\Category;
use Illuminate\Console\Attributes\Description;
use Illuminate\Console\Attributes\Signature;
use Illuminate\Console\Command;

#[Signature('app:category-content-generate')]
#[Description('Command description')]
class CategoryContentGenerate extends Command
{
    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        $categories = Category::query()->latest()
            ->whereNull('description')
            ->where('type',Category::RSS_CATEGORY_ID)
            ->where('status','inactive')
            ->get();

        foreach ($categories as $category) {

            (new SocialDetailCategoryAction(
                $category,
                mode: 'fa'
            ))->createContent();

            $this->info('content created > ' . $category->id);
        }
    }
}
