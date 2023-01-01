<?php

namespace Domain\Media\Collections;

use Domain\Media\DataObjects\MediaData;
use Domain\Media\Models\Media;
use Illuminate\Support\Collection;
use Spatie\LaravelData\DataCollection;

class MediaCollection extends Collection
{
    public function dataCollection(): DataCollection
    {
        return MediaData::collection(
            $this->map(fn (Media $model) => MediaData::from($model))
        );
    }
}
