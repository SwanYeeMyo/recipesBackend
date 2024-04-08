<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class RecipeHasDishType extends Pivot
{
    protected $table = 'dish_type_recipe';

}
