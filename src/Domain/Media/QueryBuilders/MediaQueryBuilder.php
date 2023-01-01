<?php

namespace Domain\Media\QueryBuilders;

use Illuminate\Database\Eloquent\Builder;

class MediaQueryBuilder extends Builder
{
    public function findByUuidOrFail(string $uuid): self
    {
        return $this->where('uuid', $uuid)->firstOrFail();
    }
}
