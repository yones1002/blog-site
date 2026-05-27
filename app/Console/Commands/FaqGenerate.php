<?php

namespace App\Console\Commands;

use App\Actions\SocialDetailAction;
use App\Models\Blog;
use Illuminate\Console\Attributes\Description;
use Illuminate\Console\Attributes\Signature;
use Illuminate\Console\Command;

#[Signature('app:faq-generate')]
#[Description('Command description')]
class FaqGenerate extends Command
{
    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        $blogs = Blog::query()->latest()
            ->whereNull('faq')
            ->whereNull('deleted_at')
            ->whereNotNull('rss_link')
            ->where('status','inactive')
            ->get();

        foreach ($blogs as $blog) {
            if (!is_null($blog) && !is_null($blog->long_detail))
            {
                (new SocialDetailAction($blog))->createFaq();

                $this->info('faq created > ' . $blog->id);
            }
        }
    }
}
