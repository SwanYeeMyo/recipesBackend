<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {    
        $this->call(UserTableSeeder::class);
        $this->call(RoleTableSeeder::class);
        $this->call(PermissionTableSeeder::class);
        $this->call(RolePermissionTableSeeder::class);
        $this->call(UserRoleTableSeeder::class);

        $this->call(RecipeSeeder::class);
        $this->call(DishTypeSeeder::class);
        $this->call(IngredientSeeder::class);
        $this->call(DirectionSeeder::class);
        $this->call(RatingSeeder::class);
        $this->call(ReviewSeeder::class);
    }
}
