<?php

namespace Domain\Posts\Support\QueryBuilder\Filters;

use Domain\Posts\Actions\BuildUserFeed;
use Illuminate\Database\Eloquent\Builder;
use Spatie\QueryBuilder\Filters\Filter;

class FilterList implements Filter
{
    public function __invoke(Builder $query, mixed $value, string $property): void
    {
        $feed = app(BuildUserFeed::class)->execute();

        $ids = $feed->pluck('id')->toArray();

        $query
            ->whereIn('id', $ids)
            ->orderByRaw('FIELD (id, '.implode(', ', $ids).')');
    }
}
