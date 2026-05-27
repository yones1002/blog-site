<?php

namespace App\Contracts;

interface AiCategoryDataGenerate
{
    public function createDescriptionFa(): void;
    public function createDescriptionEn(): void;
}
