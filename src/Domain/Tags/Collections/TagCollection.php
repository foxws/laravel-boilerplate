<?php

namespace Domain\Tags\Collections;

use Domain\Posts\DataObjects\PostData;
use Domain\Posts\Models\Post;
use Illuminate\Database\Eloquent\Collection;
use Spatie\LaravelData\DataCollection;

class TagCollection extends Collection
{
    public function dataCollection(): DataCollection
    {
        return PostData::collection(
            $this->map(fn (Post $model) => PostData::from($model))
        );
    }
}
