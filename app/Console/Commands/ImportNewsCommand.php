<?php

namespace App\Console\Commands;

use App\Jobs\RssJob;
use App\Models\Blog;
use Carbon\Carbon;
use Illuminate\Console\Attributes\Description;
use Illuminate\Console\Attributes\Signature;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

#[Signature('app:import-news-command')]
#[Description('Command description')]
class ImportNewsCommand extends Command
{
    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        $rss = 'https://www.irna.ir/rss';

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

        $items = collect($xml->channel->item)->take(5);

        $count = 0;

        foreach ($items as $item) {

            if ($count >= 2) {
                break;
            }

            $data = $this->syncData($item);

            RssJob::dispatch($data)->delay(now()->addSeconds(5));

            $count++;
        }

        $this->info("{$count} news imported.");
    }

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
        ];
    }
}
