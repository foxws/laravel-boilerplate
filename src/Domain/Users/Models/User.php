<?php

namespace Domain\Users\Models;

use Database\Factories\UserFactory;
use Domain\Users\Collections\UserCollection;
use Domain\Users\QueryBuilders\UserQueryBuilder;
use Domain\Users\States\UserState;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\ModelStates\HasStates;
use Spatie\Permission\Traits\HasRoles;
use Spatie\PrefixedIds\Models\Concerns\HasPrefixedId;

class User extends Authenticatable implements HasMedia, MustVerifyEmail
{
    use HasApiTokens;
    use HasFactory;
    use HasPrefixedId;
    use HasRoles;
    use HasStates;
    use InteractsWithMedia;
    use Notifiable;

    /**
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'state' => UserState::class,
    ];

    /**
     * @var array<int, string>
     */
    protected $guard_name = [
        'api',
        'web',
    ];

    protected static function newFactory(): UserFactory
    {
        return UserFactory::new();
    }

    public function newEloquentBuilder($query): UserQueryBuilder
    {
        return new UserQueryBuilder($query);
    }

    public function newCollection(array $models = []): UserCollection
    {
        return new UserCollection($models);
    }

    public function getRouteKeyName(): string
    {
        return 'prefixed_id';
    }

    public function registerMediaCollections(): void
    {
        $this
            ->addMediaCollection('avatar')
            ->acceptsMimeTypes(['image/jpeg', 'image/png', 'image/svg'])
            ->singleFile();
    }
}
