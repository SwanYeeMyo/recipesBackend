<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\Recipe\StoreRequest;
use App\Http\Services\Recipe\RecipeService;
use App\Http\Controllers\BaseApiController;
use App\Http\Requests\Recipe\UpdateRequest;
use Exception;
use Illuminate\Support\Facades\Log;

class RecipeApiController extends BaseApiController
{
    private $recipeService;

    public function __construct(RecipeService $recipeService) {

        $this->recipeService = $recipeService;
    }

    public function index()
    {
        $recipes = $this->recipeService->index();

        return $this->success($recipes, 'OK', 200);
    }

    public function store(StoreRequest $request)
    {
        try {
            // dd($request->all());
            $recipe = $this->recipeService->store($request->validated());
            return $this->success($recipe, 'Created', 201);

        } catch (Exception $e) {
            Log::error($e->getMessage());
            return $this->error("", $e->getMessage(), 500);
        }
    }

    public function show(int $id)
    {
        $recipe = $this->recipeService->findById($id);

        return $recipe ? $this->success($recipe, 'OK', 200) : $this->error($recipe, 'Id Not Found', 404);
    }

    public function update(UpdateRequest $request, int $id)
    {
        try {
            $recipe = $this->recipeService->update($request->validated(), $id);
            return $this->success($recipe, 'Updated', 200);
        } catch (Exception $e) {
            Log::error($e->getMessage());
            return $this->error("", $e->getMessage(), 500);
        }
    }

    public function destroy(int $id)
    {
        try {
            $recipe = $this->recipeService->delete($id);
            return $this->success($recipe, 'Deleted', 200);
        } catch (Exception $e) {
            Log::error($e->getMessage());
            return $this->error($recipe, '', 500);
        }
    }
}
