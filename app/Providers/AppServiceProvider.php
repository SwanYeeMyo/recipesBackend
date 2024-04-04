<?php

namespace App\Providers;


use App\Http\Repositories\Review\ReviewRepository;
use App\Http\Repositories\Review\ReviewRepositoryInterface;
use App\Http\Repositories\Recipe\RecipeRepository;
use App\Http\Repositories\Recipe\RecipeRepositoryInterface;
use App\Http\Repositories\DishType\DishTypeRepositoryInterface;
use App\Http\Repositories\DishType\DishTypeRepository;
use Illuminate\Support\ServiceProvider;
use App\Http\Repositories\Role\RoleRepository;
use App\Http\Repositories\User\UserRepository;
use App\Http\Repositories\Role\RoleRepositoryInterface;
use App\Http\Repositories\User\UserRepositoryInterface;
use App\Http\Repositories\Permission\PermissionRepository;
use App\Http\Repositories\Permission\PermissionRepositoryInterface;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {


        $this->app->bind(RecipeRepositoryInterface::class, RecipeRepository::class);

        $this->app->bind(DishTypeRepositoryInterface::class, DishTypeRepository::class);

        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
        $this->app->bind(PermissionRepositoryInterface::class, PermissionRepository::class);
        $this->app->bind(RoleRepositoryInterface::class, RoleRepository::class);

    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
