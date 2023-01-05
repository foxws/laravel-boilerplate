<?php

namespace Domain\Posts\Actions;

use Domain\Posts\Models\Post;
use Illuminate\Support\Collection;

class SearchForPosts
{
    public function execute(string $query = '*'): Collection
    {
        return Post::search($query)
            ->take(500)
            ->get();
    }
}
