<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DishType extends Model
{
    use HasFactory;

    protected $fillable = [
        'name'
    ];

    public function recipe_dish_types()
    {
        return $this->belongsToMany(Recipe::class);
    }
}
