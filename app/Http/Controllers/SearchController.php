<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\User;
use App\Recipe;
use App\Category;
use App\Ingredient_to_recipe;
use App\Ingredient;
use App\Setting;

use DB;

class SearchController extends Controller
{
    protected $paginate;
    
    public function __construct()
    {
        $this->paginate = Setting::first()->paginate_recipe;

    } 
    
    public function searchTitle(Request $request)
    {   
   
         $this->validate($request, [
             'search' => 'required | between:3,50'
             ]);
             
        $category = Category::where('name', $request->search )->first();
        $user = User::where('name', $request->search)->first();
        
        if($category != null){
            
            $recipes = Recipe::where('category_id',$category->id)->orderBy('id','desc')->paginate($this->paginate);
           
            $recipes->appends(['search' => $request->search])->links();
            
            $statusinfo = 'Recetta della categoria: "'.$request->search.'"';

        
        }else if($user != null){
            
            $recipes = Recipe::where('user_id',$user->id)->orderBy('id','desc')->paginate($this->paginate);
            
            $recipes->appends(['search' => $request->search])->links();
            
            $statusinfo = 'Recetta dell\'utente : "'.$request->search.'"';
            
       
        }
        else{
            
            $recipes = Recipe::where('title', 'like', '%'.$request->search.'%')->orderBy('id','desc')->paginate($this->paginate);
            
            $recipes->appends(['search' => $request->search])->links();
            
            $statusinfo = 'Ricerca ricette per nome: "'.$request->search.'"';
            
      
        }
        
        
        
        $recipes->appends(['search' => $request->search])->links();
        
         return view('recipe.index' ,['recipes' => $recipes, 'statusinfo' => $statusinfo ]);
        
    }
    
    public function searchIngredient(Request $request)
    {   
        
        
         $this->validate($request, [
             'ingredient' => 'required | between:3,50'
             ]);
             
    
       
        
        $recipes = Recipe::whereHas('ingredient_to_recipes', function ($query) use ($request) {
              
                $query->whereHas('ingredient', function ($query) use ($request) {
                    
                    $query->where('name', 'like', '%'.$request->ingredient.'%');
                });
            })->orderBy('id','desc')->paginate($this->paginate);

        $recipes->appends(['ingredient' => $request->ingredient])->links();
        
        return view('recipe.index' ,['recipes' => $recipes ,'statusinfo' => 'Ricette contenenti l\'ingrediente: "'.$request->ingredient.'"' ]);
        
    }

}
