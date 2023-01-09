<?php

namespace Domain\Media\DataObjects;

use Spatie\LaravelData\Data;
use Spatie\LaravelData\Lazy;
use Spatie\SchemalessAttributes\SchemalessAttributes;

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
    ) {
    }

    public static function fromModel(SchemalessAttributes $meta): self
    {
        return new self(
            title: Lazy::create(fn () => $meta->get('title')),
            copyright: Lazy::create(fn () => $meta->get('copyright')),
            artist: Lazy::create(fn () => $meta->get('artist')),
            author: Lazy::create(fn () => $meta->get('author')),
            composer: Lazy::create(fn () => $meta->get('composer')),
            album: Lazy::create(fn () => $meta->get('album')),
            location: Lazy::create(fn () => $meta->get('location')),
            show: Lazy::create(fn () => $meta->get('show')),
            episode_id: Lazy::create(fn () => $meta->get('episode_id')),
            season_number: Lazy::create(fn () => $meta->get('season_number')),
            encoder: Lazy::create(fn () => $meta->get('encoder')),
            compilation: Lazy::create(fn () => $meta->get('compilation')),
            gapless_playback: Lazy::create(fn () => $meta->get('gapless_playback')),
            description: Lazy::create(fn () => $meta->get('description')),
            comment: Lazy::create(fn () => $meta->get('comment')),
            synopsis: Lazy::create(fn () => $meta->get('synopsis')),
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
