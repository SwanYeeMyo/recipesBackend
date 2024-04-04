<?php

namespace Database\Seeders;

use App\Models\DishType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DishTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $types = [
            "Breakfast",
            "Luch",
            "Dinner",
            "Myanmar",
            "Chinese",
            "Thai",
            "Indian",
            "Japanese",
            "European",
        ];

        foreach($types as $type) {
            DishType::create([
                'name' => $type,
            ]);
        }
    }
}
