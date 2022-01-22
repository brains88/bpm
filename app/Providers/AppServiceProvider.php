<?php

namespace App\Providers;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use App\Models\Sanctum\Token;
use Illuminate\Pagination\{Paginator, LengthAwarePaginator};
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\URL;
use Laravel\Sanctum\Sanctum;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        if (!$this->app->environment('production')) {
            $this->app->register('App\Providers\FakerServiceProvider');
        }
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        if (env('APP_ENV') === 'production') {
            $this->app['request']->server->set('HTTPS','on'); // this line
            URL::forceScheme('https');
        }

        Sanctum::usePersonalAccessTokenModel(Token::class);
        Schema::defaultStringLength(191);
        Paginator::useBootstrap();

        Collection::macro('paginate', function($perPage, $total = null, $page = null, $pageName = 'page') {
            $page = $page ?: LengthAwarePaginator::resolveCurrentPage($pageName);
            return new LengthAwarePaginator(
                $this->forPage($page, $perPage), $total ?: $this->count(), $perPage, $page, ['path' => LengthAwarePaginator::resolveCurrentPath(), 'pageName' => $pageName]
            );
        });

    }
}