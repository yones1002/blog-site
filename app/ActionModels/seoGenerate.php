<?php

namespace App\ActionModels;

use App\Actions\GptAction;

class seoGenerate extends GptAction
{
    public function __construct(string $input)
    {
        parent::__construct($input);
    }

    public function makeSeo(): string|null
    {
        $parameter = "لطفا برای این متن یک متا تایتل و یک متا دیسکریپشن بنویس واسم" . $this->input;
        $seoDetail = $this->execute($parameter);

        return is_null($seoDetail) ? null : $seoDetail;
    }

    public function makeFaq(): string|null
    {
        $parameter = "لطفا برای این متن سه تا سوالات متداول همراه با پاسخ بنویس واسم" . $this->input;
        $seoDetail = $this->execute($parameter);

        return is_null($seoDetail) ? null : $seoDetail;
    }
}
