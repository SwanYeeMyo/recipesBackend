<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Recipe>
 */
class RecipeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "title" => fake()->sentence(),
            "author_note" => fake()->paragraph(),
            "kitchen_note" => fake()->paragraph(),
            "cook_time" => rand(5, 45),
            "prep_time" => random_int(5, 15),
            "serving" => rand(1, 10),
            "user_id" => rand(1, 10),
        ];
    }
}
