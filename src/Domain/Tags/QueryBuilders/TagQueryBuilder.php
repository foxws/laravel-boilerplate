<?php

namespace Domain\Tags\QueryBuilders;

use Illuminate\Database\Eloquent\Builder;

class TagQueryBuilder extends Builder
{
    public function findBySlugOrFail(string $slug): self
    {
        return $this->where('slug', $slug)->firstOrFail();
    }
}
