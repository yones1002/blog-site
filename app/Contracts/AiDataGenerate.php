<?php

namespace App\Contracts;

interface AiDataGenerate
{
    public function createSeo(): void;
    public function createFaq(): void;
}
