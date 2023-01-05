<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Collection;
use Meilisearch\Client;

class CreateIndexes extends Command
{
    /**
     * @var string
     */
    protected $signature = 'scout:create';

    /**
     * @var string
     */
    protected $description = 'Create Scout indexes';

    public function handle(): int
    {
        $client = $this->getClient();

        $settings = config('meilisearch.settings', []);

        $this->getIndexes()->each(function (array $item) use ($client, $settings): void {
            // Delete index (if exists)
            rescue(callback: fn() => $client->deleteIndex($item['name']), report: false);

            // Create index
            $client->createIndex($item['name']);

            // Update settings
            $client->index($item['name'])->updateSettings(
                array_merge($settings, $item['settings'])
            );
        });

        return Command::SUCCESS;
    }

    protected function getIndexes(): Collection
    {
        return collect(config('meilisearch.indexes'));
    }

    protected function getClient(): Client
    {
        return new Client(
            config('meilisearch.host'),
            config('meilisearch.key'),
        );
    }
}
