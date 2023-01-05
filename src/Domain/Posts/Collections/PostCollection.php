<?php

namespace Domain\Posts\Collections;

use Domain\Posts\DataObjects\PostData;
use Domain\Posts\Models\Post;
use Illuminate\Database\Eloquent\Collection;
use Spatie\LaravelData\DataCollection;

class PostCollection extends Collection
{
    public function dataCollection(): DataCollection
    {
        return PostData::collection(
            $this->map(fn (Post $model) => PostData::from($model))
        );
    }
}
