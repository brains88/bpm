<?php

namespace App\Providers;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use App\Models\Sanctum\Token;
<<<<<<< HEAD
use Illuminate\Pagination\{Paginator, LengthAwarePaginator};
use Illuminate\Database\Eloquent\Collection;
=======
use Illuminate\Pagination\Paginator;
>>>>>>> b0e72cfb0b42dc80ca26a72be07e041bc89300f5
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
<<<<<<< HEAD
=======
        if (config('app.env') === 'production') {
            \URL::forceScheme('https');
        }
>>>>>>> b0e72cfb0b42dc80ca26a72be07e041bc89300f5

        Sanctum::usePersonalAccessTokenModel(Token::class);
        Schema::defaultStringLength(191);
        Paginator::useBootstrap();
<<<<<<< HEAD

        Collection::macro('paginate', function($perPage, $total = null, $page = null, $pageName = 'page') {
            $page = $page ?: LengthAwarePaginator::resolveCurrentPage($pageName);
            return new LengthAwarePaginator(
                $this->forPage($page, $perPage), $total ?: $this->count(), $perPage, $page, ['path' => LengthAwarePaginator::resolveCurrentPath(), 'pageName' => $pageName]
            );
        });

=======
>>>>>>> b0e72cfb0b42dc80ca26a72be07e041bc89300f5
    }
}