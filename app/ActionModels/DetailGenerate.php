<?php

namespace App\ActionModels;

use App\Actions\GptAction;

class DetailGenerate extends GptAction
{
    public function __construct(string $input)
    {
        parent::__construct($input);
    }

    public function makeSeo(): ?array
    {
        $parameter = "تو یک متخصص سئو هستی.

فقط و فقط JSON معتبر بده. هیچ متن اضافه نده.

ساختار دقیق:

{
  \"meta_title\": \"...\",
  \"meta_description\": \"...\",
  \"meta_keywords\": \"...\"
}

قوانین:
- meta_title حداکثر 60 کاراکتر
- meta_description حداکثر 160 کاراکتر
- meta_keywords فقط با کاما جدا شود
- فارسی
- بدون markdown
- بدون توضیح

متن:
" . $this->input;

        $seoDetail = $this->execute($parameter);

        $decoded = json_decode($seoDetail, true);

        if (json_last_error() !== JSON_ERROR_NONE) {
            return null;
        }

        return $decoded;
    }

    public function makeFaq(): ?array
    {
        $parameter = "
تو یک متخصص تولید FAQ هستی.

فقط JSON معتبر بده.
هیچ متن اضافه، markdown یا توضیح نده.

ساختار دقیق:

[
  {
    \"question\": \"...\",
    \"answer\": \"...\"
  }
]

قوانین:
- فقط 3 سوال جامع درباره این خبر بنویس
- سوال و جواب فارسی
- answer کامل و مفید باشد
- JSON کاملاً معتبر باشد

متن:
{$this->input}
";

        $response = $this->execute($parameter);

        $decoded = json_decode($response, true);

        if (json_last_error() !== JSON_ERROR_NONE) {
            return null;
        }

        return $decoded;
    }
}
