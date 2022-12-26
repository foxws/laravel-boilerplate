<?php

namespace Domain\Media\Models;

use Domain\Media\Collections\MediaCollection;
use Domain\Media\QueryBuilders\MediaQueryBuilder;
use Domain\Media\States\MediaState;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Spatie\ModelStates\HasStates;
use Spatie\MediaLibrary\MediaCollections\Models\Media as BaseMedia;

class Media extends BaseMedia
{
    use HasStates;
    use Notifiable;

    /**
     * @var array<int, string>
     */
    protected $fillable = [
        //
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
    protected $casts = [
        'state' => MediaState::class,
    ];

    public function newEloquentBuilder($query): MediaQueryBuilder
    {
        return new MediaQueryBuilder($query);
    }

    public function newCollection(array $models = []): MediaCollection
    {
        return new MediaCollection($models);
    }

    public function getRouteKeyName(): string
    {
        return 'uuid';
    }
}
