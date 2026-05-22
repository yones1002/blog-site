<?php

namespace App\Actions;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class GptAction
{
    const apiKey = "sk-proj-1eKuE4DgdsdsU3K3iiXAEoYPtmFRgxVudcdscdscnzJVrFWxek9e-g7uz9r2eG7cdscdsceKUCauMwS-rEhUhZAgcdscsdcsdoO1OT3BlbkFJx_zM3Sz7bZ4eo-ba38kmYIz6IN6uvzXrS6XSukPsSz47Uq1PjdcsdcdiXpFWN-CiqLHpHNhdssdePZbiTHIA";

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
    private function callWebService($parmt): string|null
    {
        $apiUrl = 'https://api.openai.com/v1/chat/completions';

        Log::info('Request sent for translation');

        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . self::apiKey,
            'Content-Type' => 'application/json',
        ])->post($apiUrl, [
            'model' => 'gpt-4o-2024-08-06',
            'messages' => [
                ['role' => 'user', 'content' => $parmt],
            ],
            'max_tokens' => 1000,
            'temperature' => 0.1,
        ]);
        Log::info($response->body());
        if ($response->successful()) {
            return $response->json()['choices'][0]['message']['content'] ?? null;
        }

        Log::error('API call failed', [
            'status' => $response->status(),
            'error' => $response->json(),
        ]);

        return null;
    }
}
