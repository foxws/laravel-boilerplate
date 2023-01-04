<?php

namespace Domain\Tags\QueryBuilders;

use Domain\Tags\Models\Tag;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\QueryBuilder;

class TagIndexQuery extends QueryBuilder
{
    public function __construct(Request $request)
    {
        $query = Tag::query()
            ->with([
                'media.avatar',
            ]);

        parent::__construct($query, $request);

        $this
            ->allowedFilters('email', 'name')
            ->allowedSorts('email', 'name');
    }
}
