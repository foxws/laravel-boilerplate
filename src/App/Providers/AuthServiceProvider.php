<?php

namespace App\Providers;

use Domain\Media\Models\Media;
use Domain\Posts\Models\Post;
use Domain\Posts\Policies\MediaPolicy;
use Domain\Posts\Policies\PostPolicy;
use Domain\Posts\Policies\TagPolicy;
use Domain\Tags\Models\Tag;
use Domain\Users\Models\User;
use Domain\Users\Policies\UserPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        User::class => UserPolicy::class,
        Media::class => MediaPolicy::class,
        Post::class => PostPolicy::class,
        Tag::class => TagPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
    }
}
