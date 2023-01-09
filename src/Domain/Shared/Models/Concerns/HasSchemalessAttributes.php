<?php

namespace Domain\Shared\Models\Concerns;

use Illuminate\Database\Eloquent\Builder;
use Spatie\SchemalessAttributes\Casts\SchemalessAttributes;

trait HasSchemalessAttributes
{
    public function initializeHasSchemalessAttributes()
    {
        $this->casts['meta'] = SchemalessAttributes::class;
    }

    public function scopeWithMeta(): Builder
    {
        return $this->meta->modelScope();
    }
}
