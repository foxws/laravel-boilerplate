<?php

namespace App\Providers;

use Domain\Media\Models\Media;
use Domain\Posts\Models\Post;
use Domain\Users\Models\User;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * @var string
     */
    public const HOME = '/home';

    public function boot(): void
    {
        $this->configureModelBinding();
        $this->configureRateLimiting();

        $this->routes(function () {
            Route::middleware('api')
                ->group(base_path('routes/auth.php'));

            Route::middleware('api')
                ->group(base_path('routes/api.php'));

            Route::middleware('web')
                ->group(base_path('routes/web.php'));
        });
    }

    protected function configureModelBinding(): void
    {
        Route::bind('media', fn (string $value) => Media::findByUuidOrFail($value));
        Route::bind('post', fn (string $value) => Post::findByPrefixedIdOrFail($value));
        Route::bind('user', fn (string $value) => User::findByPrefixedIdOrFail($value));
    }

    protected function configureRateLimiting(): void
    {
        RateLimiter::for('api', function (Request $request) {
            return Limit::perMinute(60)->by($request->user()?->id ?: $request->ip());
        });
    }
}
