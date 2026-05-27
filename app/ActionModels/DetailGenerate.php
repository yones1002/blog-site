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

    public function makeFa(): string
    {
        $parameter = "
تو یک نویسنده خبری هستی.

فقط یک پاراگراف 3 تا 4 خطی برگردان.
هیچ JSON، هیچ توضیح اضافه، هیچ markdown.

قوانین:
- فقط متن ساده
- فقط فارسی
- خلاصه و خبری

متن:
{$this->input}
";

        return $this->execute($parameter);
    }

    public function makeEn(): string
    {
        $parameter = "
You are a news writer.

Return ONLY a 3–4 line paragraph.
No JSON, no markdown, no explanation.

Rules:
- plain text only
- English only
- concise news summary

Text:
{$this->input}
";

        return $this->execute($parameter);
    }
}
