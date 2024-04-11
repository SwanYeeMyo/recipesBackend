<?php

namespace App\Http\Repositories\Recipe;

use App\Models\Direction;
use App\Models\Image;
use App\Models\Ingredient;
use App\Models\Recipe;
use App\Models\User;

class RecipeRepository implements RecipeRepositoryInterface
{

    public function index()
    {
        return Recipe::with('user', 'images', 'dish_types', 'ingredients', 'directions', 'ratings', 'reviews')->get();
    }

    public function store(array $requests)
    {
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

        $dish_type_ids = $requests['dish_type'];
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

        foreach ($requests['steps'] as $step) {
            Direction::create([
                'step' => $step,
                'recipe_id' => $recipe->id,
            ]);
        }

        return $recipe;
    }

    public function recipeImage($name, $recipe_id)
    {
        Image::create([
            "name" => $name,
            "recipe_id" => $recipe_id,
        ]);
    }

    public function findById(int $id)
    {
        $recipe = Recipe::with('user', 'images', 'dish_types', 'ingredients', 'directions', 'ratings.user', 'reviews.user')->where('id', $id)->first();

        return $recipe;
    }

    public function update(array $requests, int $id)
    {
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

        $dish_type_ids = $requests['dish_type'];
        $recipe->dish_types()->sync($dish_type_ids);
        // sync function replace old data with new ones

        $recipe->ingredients()->delete();
        foreach ($requests['ingredients'] as $ingredient) {
            $recipe->ingredients()->create([
                'qty' => $ingredient['qty'],
                'measurement' => $ingredient['measurement'],
                'name' => $ingredient['name'],
            ]);
        }

        $recipe->directions()->delete();
        foreach ($requests['steps'] as $step) {
            $recipe->directions()->create([
                'step' => $step,
            ]);
        }

        return $recipe;
    }

    public function delete(int $id)
    {
        Recipe::find($id)->delete();
    }

    public function search(string $name)
    {

        // $recipes = Recipe::with('dish_types')
        //     ->whereHas('dish_types', function($query) use ($name) {
        //     $query->where('name', $name);
        // })->get();
        $recipes = Recipe::with('dish_types', 'images', 'user')
            ->where(function ($query) use ($name) {
                $query->where('title', 'like', '%' . $name . '%')
                    ->orWhereHas('dish_types', function ($q) use ($name) {
                        $q->where('name', $name);
                    });
            })
            ->get();

        return $recipes;
    }
    public function vegan()
    {
        // $recipe = Recipe::with('user', 'images', 'dish_types', 'ingredients', 'directions', 'ratings.user', 'reviews.user')->where('dish_types.name', "vegan")->get()->limit(4);
        $recipes = Recipe::with('user', 'images', 'dish_types', 'ingredients', 'directions', 'ratings.user', 'reviews.user')
            ->whereHas('dish_types', function ($query) {
                $query->where('name', 'Vegan');
            })
            ->limit(4)
            ->get();
        return $recipes;
    }
    public function meal()
    {
        // $recipe = Recipe::with('user', 'images', 'dish_types', 'ingredients', 'directions', 'ratings.user', 'reviews.user')->where('dish_types.name', "vegan")->get()->limit(4);
        $recipes = Recipe::with('user', 'images', 'dish_types', 'ingredients', 'directions', 'ratings.user', 'reviews.user')
            ->whereHas('dish_types', function ($query) {
                $query->where('name', 'Meal');
            })
            ->limit(4)
            ->get();
        return $recipes;
    }
    public function soup()
    {
        // $recipe = Recipe::with('user', 'images', 'dish_types', 'ingredients', 'directions', 'ratings.user', 'reviews.user')->where('dish_types.name', "vegan")->get()->limit(4);
        $recipes = Recipe::with('user', 'images', 'dish_types', 'ingredients', 'directions', 'ratings.user', 'reviews.user')
            ->whereHas('dish_types', function ($query) {
                $query->where('name', 'Soup');
            })
            ->limit(4)
            ->get();
        return $recipes;
    }
}
