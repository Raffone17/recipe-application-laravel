<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\User;
use App\Recipe;
use App\Category;
use App\Ingredient_to_recipe;
use App\Ingredient;

use DB;

class SearchController extends Controller
{
    public function searchTitle(Request $request)
    {   
   
         $this->validate($request, [
             'search' => 'required'
             ]);
        $category = Category::where('name', $request->search )->first();
        if($category != null){
            $recipes = Recipe::where('category_id',$category->id)->get();
            $statusinfo = 'Recetta della categoria: "'.$request->search.'"';
        }else{
            $recipes = Recipe::where('title', 'like', '%'.$request->search.'%')->get();
            $statusinfo = 'Ricerca ricette per nome: "'.$request->search.'"';
        }
        
         return view('recipe.index' ,['recipes' => $recipes, 'statusinfo' => $statusinfo ]);
        
    }
    
    public function searchIngredient(Request $request)
    {   
            // $recipes = Recipe::has('ingredient_to_recipes')->with('ingredient')->where('name','like','%'.$request->ingredient.'%')->get();
        
         $this->validate($request, [
             'ingredient' => 'required'
             ]);
        $recipes = DB::table('recipes')->join('ingredient_to_recipes','recipes.id','=','ingredient_to_recipes.recipe_id')
        ->join('ingredients', 'ingredient_to_recipes.ingredient_id', '=', 'ingredients.id')->where('ingredients.name', 'like', '%'.$request->ingredient.'%')
        ->get(array('recipes.id','recipes.title','recipes.description','recipes.category_id','recipes.user_id','recipes.difficult','recipes.created_at'));
        
        
        
        return view('recipe.index' ,['recipes' => $recipes ,'statusinfo' => 'Ricette contenenti l\'ingrediente: "'.$request->ingredient.'"' ]);
        
    }

}
