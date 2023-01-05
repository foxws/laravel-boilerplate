<?php

namespace Domain\Posts\Support\QueryBuilder\Filters;

use Domain\Posts\Actions\BuildUserFeed;
use Illuminate\Database\Eloquent\Builder;
use Spatie\QueryBuilder\Filters\Filter;

class ListFilter implements Filter
{
    public function __invoke(Builder $query, mixed $value, string $property): void
    {
        $action = app(BuildUserFeed::class)->execute();

        $ids = $action->pluck('id')->toArray();
        $idsOrder = implode(', ', $ids);

        $query
            ->whereIn('id', $ids)
            ->orderByRaw("FIELD (id, {$idsOrder})");
    }
}
