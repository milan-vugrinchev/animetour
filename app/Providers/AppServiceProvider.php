<?php

namespace App\Providers;

use App\Models\Playlist;
use App\Models\Video;
use App\Observers\Playlists;
use App\Observers\Videos;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
//        \DB::listen(function ($query) {
//            \Log::info($query->sql);
//            \Log::info($query->bindings);
//        });

        Video::observe(Videos::class);
        Playlist::observe(Playlists::class);

        if (!Collection::hasMacro('paginate')) {

            Collection::macro('paginate',
                function ($perPage = 15, $page = null, $options = []) {
                    $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
                    return (new LengthAwarePaginator(
                        $this->forPage($page, $perPage), $this->count(), $perPage, $page, $options))
                        ->withPath('');
                });
        }
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
