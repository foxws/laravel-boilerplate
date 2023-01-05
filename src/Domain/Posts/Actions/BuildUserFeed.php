<?php

namespace Domain\Posts\Actions;

use Domain\Posts\Models\Post;
use Illuminate\Support\Collection;

class BuildUserFeed
{
    public function execute(): Collection
    {
        return Post::select('id')
            ->inRandomOrder()
            ->take(500)
            ->get();
    }
}
