<?php


use App\Http\Controllers\Api\DishTypeApiController;
use App\Http\Controllers\Api\DirectionApiController;
use App\Http\Controllers\Api\IngredientApiController;

use App\Http\Controllers\Api\RecipeApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\RoleController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\LoginController;
use App\Http\Controllers\Api\PermissionController;
use App\Http\Controllers\Api\RatingApiController;
use App\Http\Controllers\Api\RegisterController;
use App\Http\Controllers\Api\ReviewApiController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('recipes', [RecipeApiController::class, 'index']);
Route::get('recipes/{id}/detail', [RecipeApiController::class, 'show']);
Route::post('recipes/search', [RecipeApiController::class, 'search']);

Route::post('login', [LoginController::class, 'login']);
Route::post('register', [RegisterController::class, 'register']);
Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::resource('users', UserController::class);
    Route::resource('roles', RoleController::class);
    Route::resource('permissions', PermissionController::class);
    Route::post('users/{id}/update', [UserController::class, 'updateUser'])->name('users.update');
    Route::post('users/changePassword', [UserController::class, 'ChangePassword'])->name('users.changePassword');

    Route::post('recipes', [RecipeApiController::class, 'store']);
    Route::post('recipes/{id}/update', [RecipeApiController::class, 'update']);
    Route::post('recipes/{id}/delete', [RecipeApiController::class, 'destroy']);

    Route::resource('ratings', RatingApiController::class);
    Route::resource('reviews', ReviewApiController::class);
    Route::resource('ingredients',IngredientApiController::class);
    Route::resource('directions', DirectionApiController::class);
    Route::resource('dishTypes', DishTypeApiController::class);
});


