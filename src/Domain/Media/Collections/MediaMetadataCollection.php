<?php

namespace Domain\Media\Collections;

use Domain\Media\DataObjects\MediaMetaData;
use Domain\Media\Models\Media;
use Illuminate\Support\Collection;
use Spatie\LaravelData\DataCollection;

class MediaMetadataCollection extends Collection
{
    public function dataCollection(): DataCollection
    {
        return MediaMetaData::collection(
            $this->map(fn (Media $model) => MediaMetaData::from($model))
        );
    }
}
