<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ingredient extends Model
{
    //
   
    public function ingredient_to_recipes()
    {
        return $this->hasMany("App\Ingredient_to_recipe");
    }
}
