<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Collection;
use Meilisearch\Client;

class DeleteIndexes extends Command
{
    /**
     * @var string
     */
    protected $signature = 'scout:delete';

    /**
     * @var string
     */
    protected $description = 'Delete Scout indexes';

    public function handle(): int
    {
        $client = $this->getClient();

        $this->getIndexes()->each(
            fn (array $item) => rescue(
                callback: fn() => $client->deleteIndex($item['name']),
                report: false
            )
        );

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
