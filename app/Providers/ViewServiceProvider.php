<?php

namespace App\Providers;

use App\Models\Category;
use App\View\Composers\CategoryComposer;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;


class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('main.data.header', CategoryComposer::class);
        View::composer('main.include.listing.listing-create', CategoryComposer::class);

        View::composer('main.include.home',CategoryComposer::class);
    }
}
