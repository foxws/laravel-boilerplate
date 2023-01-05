<?php

namespace Domain\Posts\QueryBuilders;

use Domain\Posts\Models\Post;
use Domain\Posts\Support\QueryBuilder\Filters\ListFilter;
use Domain\Posts\Support\QueryBuilder\Filters\QueryFilter;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class PostIndexQuery extends QueryBuilder
{
    public function __construct(Request $request)
    {
        $query = Post::query()->with(['media']);

        parent::__construct($query, $request);

        $this
            ->allowedFilters([
                AllowedFilter::custom('list', new ListFilter),
                AllowedFilter::custom('query', new QueryFilter),
            ]);
    }
}
