<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Ingredient>
 */
class IngredientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'qty' => rand(1, 20),
            'measurement' => $this->faker->word(),
            'name' => $this->faker->name(),
            'recipe_id' => $this->faker->numberBetween(1, 15),
        ];
    }
}
