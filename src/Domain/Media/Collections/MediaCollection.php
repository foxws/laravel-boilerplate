<?php

namespace Domain\Media\Collections;

use Domain\Media\DataObjects\MediaData;
use Domain\Media\Models\Media;
use Spatie\LaravelData\DataCollection;
use Spatie\MediaLibrary\MediaCollections\Models\Collections\MediaCollection as Collection;

class MediaCollection extends Collection
{
    public function dataCollection(): DataCollection
    {
        return MediaData::collection(
            $this->map(fn (Media $model) => MediaData::from($model))
        );
    }
}
