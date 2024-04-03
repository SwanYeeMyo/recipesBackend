<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Services\Recipe\RecipeService;
use App\Models\Recipe;
use Illuminate\Http\Request;

class RecipeApiController extends Controller
{
    private $recipeService;

    public function __construct(RecipeService $recipeService) {

        $this->recipeService = $recipeService;
    }

    public function index()
    {
        $recipes = $this->recipeService->index();
        return $recipes;
    }

    public function store(Request $request)
    {
       $recipe = $this->recipeService->store($request->all());
       return $recipe;
    }

    public function show(int $id)
    {
        return $this->recipeService->findById($id);
    }

    public function update(Request $request, int $id)
    {
        $recipe = $this->recipeService->update($request->all(), $id);
        return $recipe;
    }

    public function destroy(int $id)
    {
        $this->recipeService->delete($id);
        return "id:$id Deleted!";
    }
}
