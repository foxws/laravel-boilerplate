<?php

namespace Domain\Posts\Support\QueryBuilder\Filters;

use Spatie\QueryBuilder\Filters\Filter;
use Illuminate\Database\Eloquent\Builder;

class FilterList implements Filter
{
    public function __invoke(Builder $query, mixed $value, string $property): void
    {
        // $query->whereHas('permissions', function (Builder $query) use ($value) {
        //     $query->where('name', $value);
        // });
    }
}
