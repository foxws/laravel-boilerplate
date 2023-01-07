<?php

namespace Domain\Media\DataObjects;

use Domain\Media\Models\MediaMetadata as Model;
use Illuminate\Support\Carbon;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Lazy;

class MediaMetaData extends Data
{
    public function __construct(
        public Lazy|string|null $title,
        public Lazy|string|null $copyright,
        public Lazy|string|null $artist,
        public Lazy|string|null $author,
        public Lazy|string|null $composer,
        public Lazy|string|null $album,
        public Lazy|string|null $location,
        public Lazy|string|null $show,
        public Lazy|string|null $episode_id,
        public Lazy|string|null $season_number,
        public Lazy|string|null $encoder,
        public Lazy|bool|null $compilation,
        public Lazy|bool|null $gapless_playback,
        public Lazy|string|null $description,
        public Lazy|string|null $comment,
        public Lazy|string|null $synopsis,
        public Lazy|Carbon|null $released_at,
        public Lazy|Carbon $created_at,
        public Lazy|Carbon $updated_at,
    ) {
    }

    public static function fromModel(Model $model): self
    {
        return new self(
            title: Lazy::create(fn () => $model->title),
            copyright: Lazy::create(fn () => $model->copyright),
            artist: Lazy::create(fn () => $model->artist),
            author: Lazy::create(fn () => $model->author),
            composer: Lazy::create(fn () => $model->composer),
            album: Lazy::create(fn () => $model->album),
            location: Lazy::create(fn () => $model->location),
            show: Lazy::create(fn () => $model->show),
            episode_id: Lazy::create(fn () => $model->episode_id),
            season_number: Lazy::create(fn () => $model->season_number),
            encoder: Lazy::create(fn () => $model->encoder),
            compilation: Lazy::create(fn () => $model->compilation),
            gapless_playback: Lazy::create(fn () => $model->gapless_playback),
            description: Lazy::create(fn () => $model->description),
            comment: Lazy::create(fn () => $model->comment),
            synopsis: Lazy::create(fn () => $model->synopsis),
            released_at: Lazy::create(fn () => $model->released_at),
            created_at: Lazy::create(fn () => $model->created_at),
            updated_at: Lazy::create(fn () => $model->updated_at),
        );
    }

    public static function authorize(): bool
    {
        return true;
    }

    public static function rules(): array
    {
        return [
            //
        ];
    }
}
