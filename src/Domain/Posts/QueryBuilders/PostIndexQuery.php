<?php

namespace Domain\Posts\QueryBuilders;

use Domain\Posts\Models\Post;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\QueryBuilder;

class PostIndexQuery extends QueryBuilder
{
    public function __construct(Request $request)
    {
        $query = Post::query()
            ->with([
                'media',
            ]);

        parent::__construct($query, $request);

        $this
            ->allowedFilters('email', 'name')
            ->allowedSorts('email', 'name');
    }
}
