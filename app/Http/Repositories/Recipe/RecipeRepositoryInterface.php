<?php

namespace App\Http\Repositories\Recipe;

interface RecipeRepositoryInterface {

    public function index();

    public function store(array $requests);

    public function recipeImage(string $name, int $recipe_id);

    public function findById(int $id);

    // public function update(array $requests, int $id);

    public function delete(int $id);
}
