<?php

namespace Domain\Media\Collections;

use Domain\Media\DataObjects\MediaMetaData;
use Domain\Media\Models\MediaMetadata as Model;
use Illuminate\Support\Collection;
use Spatie\LaravelData\DataCollection;

class MediaMetadataCollection extends Collection
{
    public function dataCollection(): DataCollection
    {
        return MediaMetaData::collection(
            $this->map(fn (Model $model) => MediaMetaData::from($model))
        );
    }
}
