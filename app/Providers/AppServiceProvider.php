<?php

namespace App\Providers;

use App\Http\Repositories\Recipe\RecipeRepository;
use App\Http\Repositories\Recipe\RecipeRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(RecipeRepositoryInterface::class, RecipeRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
