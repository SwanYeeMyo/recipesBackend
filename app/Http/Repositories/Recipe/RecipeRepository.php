<?php

namespace App\Http\Repositories\Recipe;

use App\Models\Image;
use App\Models\Recipe;

class RecipeRepository implements RecipeRepositoryInterface {

    public function index() {
        return Recipe::all();
    }

    public function store(array $requests) {

        $recipe = Recipe::create([
            "title" => $requests['title'],
            "author_note" => $requests['author_note'],
            "kitchen_note" => $requests['kitchen_note'],
            "cook_time" => $requests['cook_time'],
            "prep_time" => $requests['prep_time'],
            "serving" => $requests['serving'],
            "type" => $requests['type'],
            "user_id" => $requests['user_id'],
        ]);
        return $recipe;
    }

    public function recipeImage($name, $recipe_id) {
        Image::create([
            "name" => $name,
            "recipe_id" => $recipe_id,
        ]);
    }

    public function findById(int $id) {
        return Recipe::find($id);
    }

    public function update(array $requests, int $id) {
        $recipe = $this->findById($id);

        $recipe->update([
            "title" => $requests['title'],
            "author_note" => $requests['author_note'],
            "kitchen_note" => $requests['kitchen_note'],
            "cook_time" => $requests['cook_time'],
            "prep_time" => $requests['prep_time'],
            "serving" => $requests['serving'],
            "type" => $requests['type'],
            "user_id" => $requests['user_id'],
        ]);
        return $recipe;
    }

    public function delete(int $id) {
        Recipe::find($id)->delete();
    }
}
