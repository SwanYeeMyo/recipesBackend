<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Recipe\StoreRequest;
use App\Http\Services\Recipe\RecipeService;
use App\Http\Controllers\BaseApiController;
use App\Http\Requests\Recipe\UpdateRequest;
use Exception;
use Illuminate\Support\Facades\Log;

class RecipeApiController extends BaseApiController
{
    private $recipeService;

    public function __construct(RecipeService $recipeService)
    {

        $this->recipeService = $recipeService;
    }

    public function index()
    {
        $recipes = $this->recipeService->index();

        return $this->success(200, 'OK', $recipes);
    }

    public function store(StoreRequest $request)
    {
        // dd($request->all());
        try {
            $recipe = $this->recipeService->store($request->validated());
            return $this->success(201, 'Created', $recipe);
        } catch (Exception $e) {
            Log::error($e->getMessage());
            return $this->error(500);
        }
    }

    public function show(int $id)
    {
        $recipe = $this->recipeService->findById($id);

        return $recipe ? $this->success(200, 'OK', $recipe) : $this->error(404, 'Id Not Found', $recipe);
    }

    public function update(UpdateRequest $request, int $id)
    {
        try {
            $recipe = $this->recipeService->update($request->validated(), $id);
            return $this->success(200, 'Updated', $recipe);
        } catch (Exception $e) {
            Log::error($e->getMessage());
            return $this->error(500);
        }
    }

    public function destroy(int $id)
    {
        try {
            $this->recipeService->delete($id);
            return $this->success(200, 'Deleted');
        } catch (Exception $e) {
            Log::error($e->getMessage());
            return $this->error(500);
        }
    }
}
