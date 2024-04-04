<?php

use App\Http\Controllers\Api\DishTypeApiController;
use App\Http\Controllers\Api\RecipeApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::resource('recipes', RecipeApiController::class);
Route::resource('dishTypes', DishTypeApiController::class);

Route::post('recipes/{id}/update', [RecipeApiController::class, 'update']);
