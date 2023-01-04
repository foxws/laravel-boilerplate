<?php

namespace App\Providers;

use Domain\Posts\Models\Post;
use Domain\Tags\Models\Tag;
use Domain\Users\Models\User;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;
use Spatie\PrefixedIds\PrefixedIds;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        $this->configurePrefixedIds();
    }

    protected function configurePrefixedIds(): void
    {
        PrefixedIds::generateUniqueIdUsing(fn () => Str::random(12));

        PrefixedIds::registerModels([
            'user-' => User::class,
            'post-' => Post::class,
            'tag-' => Tag::class,
        ]);
    }
}
