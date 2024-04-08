<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'author_note', 'kitchen_note',
        'cook_time', 'prep_time', 'serving', 'type', 'user_id',
    ];

    public function images()
    {
        return $this->hasMany(Image::class);
    }

    public function dish_types()
    {
        return $this->belongsToMany(DishType::class);
    }

    public function ingredients()
    {
        return $this->hasMany(Ingredient::class);
    }

    public function directions()
    {
        return $this->hasMany(Direction::class);
    }

    public function ratings()
    {
        return $this->hasMany(Rating::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
