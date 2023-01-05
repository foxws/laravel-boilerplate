<?php

namespace Domain\Posts\Actions;

use Domain\Posts\Models\Post;
use Illuminate\Support\Collection;

class SearchPosts
{
    public function execute(): Collection
    {
        // TODO: personalization

        return Post::select('id')
            ->inRandomOrder()
            ->take(500)
            ->get();
    }
}
