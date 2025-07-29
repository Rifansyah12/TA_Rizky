<?php

namespace App\Providers;
use App\Models\Galeri;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    public function boot()
    {
        View::composer('*', function ($view) {
            $view->with('galeris', Galeri::latest()->take(6)->get());
        });
    }

}
