<?php

namespace App\Actions;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class GptAction
{
    public function __construct(protected string $input)
    {
    }

    protected function execute(string $parmet): string|null
    {
        return $this->callWebService($parmet);
    }
    public function ask(string $prompt): ?string
    {
        return $this->execute($prompt);
    }
    private function callWebService($prompt): ?string
    {
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . env('OPENROUTER_API_KEY'),
            'Content-Type' => 'application/json',
            'HTTP-Referer' => 'http://localhost',
            'X-Title' => 'Laravel App',
        ])->post('https://openrouter.ai/api/v1/chat/completions', [
            'model' => 'deepseek/deepseek-chat-v3',
            'messages' => [
                [
                    'role' => 'user',
                    'content' => $prompt,
                ]
            ],
        ]);
        return $response->json()['choices'][0]['message']['content'] ?? null;
    }
}
