<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // DESCOMENTAR ESTE CODIGO CUANDO SE SUBA A PRODUCCION
        //$this->app->bind('path.public', function() {
        //    return base_path().'/../public_html';
        //});
    }
}
