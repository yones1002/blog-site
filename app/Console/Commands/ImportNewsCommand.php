<?php

namespace App\Console\Commands;

use App\Jobs\RssJob;
use App\Models\Blog;
use Carbon\Carbon;
use Illuminate\Console\Attributes\Description;
use Illuminate\Console\Attributes\Signature;
use Illuminate\Console\Command;
use Illuminate\Http\Client\ConnectionException;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

#[Signature('app:import-news-command')]
#[Description('Command description')]
class ImportNewsCommand extends Command
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

            $data = $this->syncData($item);

            $exists = Blog::query()
                ->where('rss_link', $data['link'])
                ->where('title', $data['title'])
                ->exists();

            if ($exists) {

                $this->warn("Skipped: {$data['title']}");

                continue;
            }
            RssJob::dispatch($data);
            $this->info("Imported: {$data['title']}");
            $count++;
        }
        $this->newLine();
        $this->info("Total imported: {$count}");
    }

    /**
     * @param $item
     * @return array
     */
    public function syncData($item): array
    {
        $title = trim((string) $item->title);

        $link = trim((string) $item->link);

        $description = trim(strip_tags((string) $item->description));

        $slug = Str::slug($title);

        $image = null;

        if (isset($item->enclosure)) {
            $attributes = $item->enclosure->attributes();

            $image = (string) $attributes['url'];
        }

        return [
            'title' => $title,
            'slug' => $slug,
            'short_detail' => Str::limit($description, 120),
            'long_detail' => $description,
            'cover' => $image,
            'link' => $link,
            'category' => isset($item->category) ? (string) $item->category : null,
        ];
    }
}
