<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Illuminate\Database\Eloquent\Relations\Relation;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {

        // Get all models in the App\Models namespace
        $models = getModelsInNamespace('App\Models');
        // Register the morph map dynamically
        Relation::morphMap($models);

        Paginator::useBootstrap();
    }
}
