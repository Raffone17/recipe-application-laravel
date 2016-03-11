<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    //
    public function ingredient_to_recipes()
    {
        return $this->hasMany("App\Ingredient_to_recipe");
    }
    public function category()
    {
        return $this->belongsTo("App\Category");
    }
    public function user()
    {
        return $this->belongsTo("App\User");
    }
}
