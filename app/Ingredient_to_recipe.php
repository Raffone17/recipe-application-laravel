<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ingredient_to_recipe extends Model
{
    //
    public function recipe()
    {
        return $this->BelongsTo("App\Recipe");
    }
    
    public function ingredient()
    {
        return $this->BelongsTo("App\Ingredient");   
    }
}
