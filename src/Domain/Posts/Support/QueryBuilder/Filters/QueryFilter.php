<?php

namespace Domain\Posts\Support\QueryBuilder\Filters;

use Domain\Posts\Actions\SearchForPosts;
use Illuminate\Database\Eloquent\Builder;
use Spatie\QueryBuilder\Filters\Filter;

class QueryFilter implements Filter
{
    public function __invoke(Builder $query, mixed $value, string $property): void
    {
        if (! is_string($value) || strlen($value) < 1) {
            return;
        }

        $action = app(SearchForPosts::class)->execute($value);

        $ids = $action->pluck('id')->toArray();
        $idsOrder = implode(', ', $ids);

        $query
            ->whereIn('id', $ids)
            ->orderByRaw("FIELD (id, {$idsOrder})");
    }
}
