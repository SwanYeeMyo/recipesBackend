<?php

namespace App\Http\Repositories\Recipe;

use App\Models\Direction;
use App\Models\Image;
use App\Models\Ingredient;
use App\Models\Recipe;

class RecipeRepository implements RecipeRepositoryInterface {

    public function index() {
        return Recipe::with('images', 'dish_types', 'ingredients', 'directions')->get();
    }

    public function store(array $requests) {
        $recipe = Recipe::create([
            "title" => $requests['title'],
            "author_note" => $requests['author_note'],
            "kitchen_note" => $requests['kitchen_note'],
            "cook_time" => $requests['cook_time'],
            "prep_time" => $requests['prep_time'],
            "serving" => $requests['serving'],
            "user_id" => $requests['user_id'],
        ]);

        $dish_type_ids = $requests['types'];
        $recipe->dish_types()->attach($dish_type_ids);

        foreach ($requests['ingredients'] as $ingredient) {
            // dd($ingredient);
            Ingredient::create([
                'qty' => $ingredient['qty'],
                'measurement' => $ingredient['measurement'],
                'name' => $ingredient['name'],
                'recipe_id' => $recipe->id,
            ]);
        }

        foreach($requests['steps'] as $step) {
            Direction::create([
                'step' => $step,
                'recipe_id' => $recipe->id,
            ]);
        }

        return $recipe;
    }

    public function recipeImage($name, $recipe_id) {
        Image::create([
            "name" => $name,
            "recipe_id" => $recipe_id,
        ]);
    }

    public function findById(int $id) {
        // return Recipe::find($id);
        return Recipe::with('images', 'dish_types', 'ingredients', 'directions')->where('id', $id)->first();

    }

    // public function update(array $requests, int $id) {
    //     $recipe = $this->findById($id);

    //     $recipe->update([
    //         "title" => $requests['title'],
    //         "author_note" => $requests['author_note'],
    //         "kitchen_note" => $requests['kitchen_note'],
    //         "cook_time" => $requests['cook_time'],
    //         "prep_time" => $requests['prep_time'],
    //         "serving" => $requests['serving'],
    //         "user_id" => $requests['user_id'],
    //     ]);

    //     $dish_type_ids = $requests['types'];
    //     $recipe->dish_types()->sync($dish_type_ids);
    //     // sync function replace old data with new ones

    //     // foreach ($requests['ingredients'] as $ingredientData) {
    //     //     // dd($ingredientData);
    //     //     $ingredient = Ingredient::find($ingredientData['recipe_id']);
    //     //     $ingredient->update([
    //     //         'qty' => $ingredientData['qty'],
    //     //         'measurement' => $ingredientData['measurement'],
    //     //         'name' => $ingredientData['name'],
    //     //         'recipe_id' => $recipe->id,
    //     //     ]);
    //     // }

    //     // dd($requests['steps']);
    //     foreach($requests['steps'] as $stepData) {
    //         dd($stepData);
    //         $step = Direction::find($stepData['recipe_id']);
    //         $step->update([
    //             'step' => $stepData['step'],
    //             'recipe_id' => $recipe->id,
    //         ]);
    //     }

    //     return $recipe;
    // }

    public function delete(int $id) {
        Recipe::find($id)->delete();
    }
}

