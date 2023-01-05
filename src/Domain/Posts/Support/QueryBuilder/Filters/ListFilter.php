<?php

namespace Domain\Posts\Support\QueryBuilder\Filters;

use Domain\Posts\Actions\PostsByList;
use Illuminate\Database\Eloquent\Builder;
use Spatie\QueryBuilder\Filters\Filter;

class ListFilter implements Filter
{
    public function __invoke(Builder $query, mixed $value, string $property): void
    {
        $action = app(PostsByList::class)->execute($value);

        $ids = $action->pluck('id')->toArray();
        $idsOrder = implode(', ', $ids);

        $query
            ->whereIn('id', $ids)
            ->orderByRaw("FIELD (id, {$idsOrder})");
    }
}
