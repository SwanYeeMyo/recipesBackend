<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'author_note', 'kitchen_note',
        'cook_time', 'prep_time', 'serving', 'user_id',
    ];

    public function images()
    {
        return $this->hasMany(Image::class);
    }

    public function dish_types()
    {
        return $this->belongsToMany(DishType::class);
    }
}
