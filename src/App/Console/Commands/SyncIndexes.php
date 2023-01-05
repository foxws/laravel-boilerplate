<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Artisan;

class SyncIndexes extends Command
{
    /**
     * @var string
     */
    protected $signature = 'scout:sync';

    /**
     * @var string
     */
    protected $description = 'Sync Scout indexes';

    public function handle(): int
    {
        $this->getClasses()->each(
            fn (string $model) => Artisan::call('scout:import', compact('model'))
        );

        return Command::SUCCESS;
    }

    protected function getClasses(): Collection
    {
        return collect(config('meilisearch.models'));
    }
}
