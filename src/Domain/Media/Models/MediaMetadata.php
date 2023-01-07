<?php

namespace Domain\Media\Models;

use Domain\Media\Collections\MediaMetadataCollection;
use Domain\Media\QueryBuilders\MediaMetadataQueryBuilder;
use Illuminate\Database\Eloquent\Model;

class MediaMetadata extends Model
{
    /**
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
        'copyright',
        'artist',
        'author',
        'composer',
        'album',
        'location',
        'show',
        'episode_id',
        'season_number',
        'encoder',
        'compilation',
        'gapless_playback',
        'description',
        'comment',
        'synopsis',
        'released_at',
    ];

    /**
     * @var array<int, string>
     */
    protected $hidden = [
        //
    ];

    /**
     * @var array<string, string>
     */
    // protected $casts = [
    // 'state' => MediaMediaState::class,
    // ];

    public function newEloquentBuilder($query): MediaMetadataQueryBuilder
    {
        return new MediaMetadataQueryBuilder($query);
    }

    public function newCollection(array $models = []): MediaMetadataCollection
    {
        return new MediaMetadataCollection($models);
    }
}
