<?php

namespace Domain\Posts\Actions;

use Domain\Posts\Models\Post;
use Illuminate\Support\Collection;

class PostsByList
{
    public function execute(string $value): Collection
    {
        return match ($value) {
            'feed' => $this->getUserFeed(),
            // default => $this->getByList($value)
        };
    }

    protected function getUserFeed(): Collection
    {
        return Post::select('id')
            // ->inRandomOrder()
            ->take(500)
            ->get();
    }
}
