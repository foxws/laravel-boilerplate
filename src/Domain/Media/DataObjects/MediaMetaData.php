<?php

namespace Domain\Media\DataObjects;

use Illuminate\Support\Carbon;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Lazy;

class MediaMetaData extends Data
{
    public function __construct(
        public Lazy|string $title,
        public Lazy|string $copyright,
        public Lazy|string $artist,
        public Lazy|string $author,
        public Lazy|string $composer,
        public Lazy|string $album,
        public Lazy|string $make,
        public Lazy|string $model,
        public Lazy|string $location,
        public Lazy|string $grouping,
        public Lazy|string $show,
        public Lazy|string $episode_id,
        public Lazy|string $season_number,
        public Lazy|string $encoder,
        public Lazy|bool $compilation,
        public Lazy|bool $gapless_playback,
        public Lazy|string $description,
        public Lazy|string $comment,
        public Lazy|string $synopsis,
        public Lazy|Carbon $released_at,
        public Lazy|Carbon $created_at,
        public Lazy|Carbon $updated_at,
    ) {
    }

    public static function fromModel(MediaData $model): self
    {
        return new self(
            title: Lazy::create(fn () => $model->title),
            copyright: Lazy::create(fn () => $model->copyright),
            artist: Lazy::create(fn () => $model->artist),
            author: Lazy::create(fn () => $model->author),
            composer: Lazy::create(fn () => $model->composer),
            album: Lazy::create(fn () => $model->album),
            make: Lazy::create(fn () => $model->make),
            model: Lazy::create(fn () => $model->model),
            location: Lazy::create(fn () => $model->location),
            grouping: Lazy::create(fn () => $model->grouping),
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
