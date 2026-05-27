<?php

namespace App\Console\Commands;

use App\Jobs\RssCategoriesJob;
use App\Models\Category;
use Illuminate\Console\Attributes\Description;
use Illuminate\Console\Attributes\Signature;
use Illuminate\Console\Command;
use Illuminate\Http\Client\ConnectionException;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

#[Signature('app:import-categories-command')]
#[Description('Command description')]
class ImportCategoriesCommand extends Command
{
    /**
     * Execute the console command.
     * @throws ConnectionException
     */
    public function handle(): void
    {
        $rss = 'https://www.irna.ir/rss/tp/1';

        $response = Http::timeout(20)->get($rss);

        if (!$response->successful()) {
            $this->error('RSS unavailable');

            return;
        }

        $xml = simplexml_load_string(
            $response->body(),
            'SimpleXMLElement',
            LIBXML_NOCDATA
        );

        $count = 0;

        foreach ($xml->channel->item as $item) {

            if ($count >= 10) {
                break;
            }

            $data = $this->extractCategory($item);

            $exists = Category::query()
                ->where('slug', $data['slug'])
                ->exists();

            if ($exists) {

                $this->warn("Skipped: {$data['slug']}");

                continue;
            }
            RssCategoriesJob::dispatch($data);
            $this->info("Imported: {$data['slug']}");
            $count++;
        }
        $this->newLine();
        $this->info("Total imported: {$count}");
    }

    private function extractCategory($item): ?array
    {
        if (!isset($item->category)) {
            return null;
        }

        $categoryNode = $item->category;

        $name = trim((string) $categoryNode);
        $slug = isset($categoryNode['domain'])
            ? trim((string) $categoryNode['domain'])
            : Str::slug($name);

        if (!$name) {
            return null;
        }

        return [
            'name' => $name,
            'slug' => $slug,
        ];
    }
}
