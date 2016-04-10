<?php

namespace App\Providers;

use App\Http\Composers\CategoriesComposer;
use App\Http\Composers\SlidesComposer;
use Illuminate\Support\ServiceProvider;

class ViewComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->composeCategories();
        $this->composeSlides();
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    public function composeCategories()
    {
        view()->composer('partials._categories', CategoriesComposer::class);
    }

    public function composeSlides()
    {
        view()->composer('partials._slides', SlidesComposer::class);
    }
}
