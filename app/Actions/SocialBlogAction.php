<?php

namespace App\Actions;

use App\Contracts\AiDataGenerate;
use App\Models\Blog;
use App\ActionModels\seoGenerate;
use App\Services\SeoService;

class SocialBlogAction implements AiDataGenerate
{
    protected seoGenerate $seoGenerate;
    protected string|null $response;

    public function __construct(protected Blog $blog, protected int $seoGenerateId = 0)
    {
        $this->seoGenerate = new seoGenerate($this->blog->long_detail);
    }

    public function createSeo(): void
    {
        $seo = $this->seoGenerate->makeSeo();

        if (is_null($seo)) {
            return;
        }
        $this->insertSeo($seo);
    }
    public function createFaq(): void
    {
        $faq = $this->seoGenerate->makeFaq();

        if (is_null($faq)) {
            return;
        }
        $this->insertFaq($faq);
    }
    public function insertSeo($message): void
    {
        SeoService::updateSeo($this->blog->id, $message);
    }
    public function insertFaq($message): void
    {
        SeoService::updateFaq($this->blog->id, $message);
    }
}
