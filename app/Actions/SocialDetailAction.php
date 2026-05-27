<?php

namespace App\Actions;

use App\ActionModels\DetailGenerate;
use App\Contracts\AiDataGenerate;
use App\Models\Blog;
use App\Services\SeoService;

class SocialDetailAction implements AiDataGenerate
{
    protected DetailGenerate $Generate;
    protected string|null $response;

    public function __construct(protected Blog $blog, protected int $GenerateId = 0)
    {
        $this->Generate = new DetailGenerate($this->blog->long_detail);
    }

    public function createSeo(): void
    {
        $seo = $this->Generate->makeSeo();

        if (is_null($seo)) {
            return;
        }
        $this->insertSeo($seo);
    }
    public function createFaq(): void
    {
        $faq = $this->Generate->makeFaq();

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
    public function insertFaq(array $faqs): void
    {

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
