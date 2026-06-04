<?php

namespace App\Actions;

use App\ActionModels\DetailGenerate;
use App\Contracts\AiCategoryDataGenerate;
use App\Contracts\AiDataGenerate;
use App\Models\Blog;
use App\Models\Category;
use App\Services\DetailService;

class SocialDetailCategoryAction implements AiCategoryDataGenerate
{
    protected DetailGenerate $Generate;
    protected string|null $response;

    public function __construct(
        protected Category $category,
        protected string $mode = 'fa'
    ) {
        $this->Generate = new DetailGenerate($this->category->fa_name);
    }

    /**
     * @return void
     */
    public function createContent(): void
    {
        match ($this->mode) {
            'fa' => $this->createDescriptionFa(),
            'en' => $this->createDescriptionEn(),
            default => $this->createBoth(),
        };
    }

    /**
     * @return void
     */
    public function createBoth(): void
    {
        $this->createDescriptionFa();
        $this->createDescriptionEn();
    }
    public function createDescriptionFa(): void
    {
        $fa = $this->Generate->makeFa();

        $this->insertFa($fa);
    }

    /**
     * @return void
     */
    public function createDescriptionEn(): void
    {
        $en = $this->Generate->makeEn();

        $this->insertEn($en);
    }

    /**
     * @param $message
     * @return void
     */
    public function insertFa($message): void
    {
        if (!$message) {
            return;
        }
        DetailService::updateFaContent($this->category->id, $message);
    }

    /**
     * @param $message
     * @return void
     */
    public function insertEn($message): void
    {
        if (!$message) {
            return;
        }
        DetailService::updateEnContent($this->category->id, $message);
    }
}
