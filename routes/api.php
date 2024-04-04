<?php

use App\Http\Controllers\Api\DirectionApiController;
use App\Http\Controllers\Api\IngredientApiController;
use App\Http\Controllers\Api\RatingApiController;
use App\Http\Controllers\Api\ReviewApiController;
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

Route::resource('ratings', RatingApiController::class);
Route::resource('reviews',ReviewApiController::class);
Route::resource('ingredients',IngredientApiController::class);
Route::resource('directions', DirectionApiController::class);
