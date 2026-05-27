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
        if (!is_array($message)) {
            return;
        }

        $seo = [
            [
                'meta_title' => $message['meta_title'] ?? '',
                'og_title' => $message['meta_title'] ?? '',
                'twitter_title' => $message['meta_title'] ?? '',
                'meta_description' => $message['meta_description'] ?? '',
                'og_description' => $message['meta_description'] ?? '',
                'twitter_description' => $message['meta_description'] ?? '',
                'meta_keywords' => $message['meta_keywords'] ?? '',
            ]
        ];

        SeoService::updateSeo($this->blog->id, $seo);
    }
    public function insertFaq(array $faqs)
    {

        if (!is_array($faqs)) {
            return;
        }

        $data = [];

        foreach ($faqs as $faq) {
            if (empty($faq['question']) || empty($faq['answer'])) {
                continue;
            }

            $data[] = [
                'question' => $faq['question'],
                'answer' => $faq['answer'],
            ];
        }
        if (empty($data)) {
            return;
        }

        SeoService::updateFaq($this->blog->id, $data);
    }
}
