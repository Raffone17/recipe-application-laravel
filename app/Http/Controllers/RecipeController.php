<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\User;
use App\Recipe;
use App\Category;
use App\Ingredient_to_recipe;
use App\Ingredient;

use Illuminate\Support\Facades\Auth;

class RecipeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $recipes= Recipe::all()->take(100);
       
        
        return view('recipe.index' ,['recipes' => $recipes]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        
        $categories = Category::all();
        $ingredients = Ingredient::orderBy('name')->get();
        
        return view('recipe.create', ['categories' => $categories, 'ingredients' => $ingredients ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        
        $this->validate($request, [
        'title' => 'required',
        'description' => 'required',
        'category' => 'required',
        'difficult' => 'required',
        'imageToUpload' => 'image|max:400',

        ]);
        
        
        
        $recipe = new Recipe;
        $recipe->title = $request->title;
        $recipe->description = $request->description;
        
        $category = Category::where('name',$request->category)->first();
       
        $recipe->category_id = $category->id;
        
        $recipe->user_id = Auth::id();
        $recipe->difficult = $request->difficult;
        
        $recipe->save();
        $recipe_id = $recipe->id;
        
        $ingredients = $request->ingredient;
        $ingredients = explode(", ",$ingredients);
        foreach($ingredients as $ingredient){
            $ingredient_to_recipe = new Ingredient_to_recipe;
            if(!empty($ingredient)){
                if(Ingredient::where('name',$ingredient)->count()==null){
                    $set_ingredient = new Ingredient;
                    $set_ingredient->name = $ingredient;
                    $set_ingredient->save();
                    $ingredient_to_recipe->ingredient_id = $set_ingredient->id;
                }else{
                    $ingredient_id = Ingredient::where('name',$ingredient)->first();
                    $ingredient_to_recipe->ingredient_id  = $ingredient_id->id;
                }
                $ingredient_to_recipe->recipe_id = $recipe_id;
                $ingredient_to_recipe->save();
            }
        }
        
        if ($request->hasFile('imageToUpload')) {
            if ($request->file('imageToUpload')->isValid()) {
                if(substr($request->file('imageToUpload')->getMimeType(), 0, 5) == 'image') {
   

                 $destinationPath = 'assets/img/recipe';
                $request->file('imageToUpload')->move($destinationPath, $recipe_id.".jpg");
                $error_image="";
                }else{
                    $error_image=" Il file non è un immagine, non è stata caricata!";
                }
            }   
        }
         if(!isset($error_image)){
                $error_image="";
            }
     
 
    	return redirect()->route('recipe.index')->with('status', 'Riccetta Aggiunta!'.$error_image);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       
        $recipe= Recipe::find($id);
        
        $ingredients_to_recipes = Recipe::find($id)->ingredient_to_recipes;
      
        
        return view('recipe.show' ,['recipe' => $recipe, 'ingredients_to_recipes' => $ingredients_to_recipes]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $recipe= Recipe::find($id);
        $categories = Category::all();
        
        $ingredients_to_recipes = Recipe::find($id)->ingredient_to_recipes;
        if(Auth::id()==$recipe->user_id){
            return view('recipe.edit' ,['recipe' => $recipe, 'ingredients_to_recipes' => $ingredients_to_recipes, 'categories' => $categories]);
        }else{
            return redirect()->route('recipe.index')->with('status-warning', 'Non hai i permessi per modificare questa ricetta!');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
         $this->validate($request, [
        'title' => 'required',
        'description' => 'required',
        'category' => 'required',
        'difficult' => 'required',
        ]);
        
        $recipe = Recipe::find($id);
        if($recipe->user_id == Auth::id()){
            $recipe->title = $request->title;
            $recipe->description = $request->description;
            
            $category = Category::where('name',$request->category)->first();
           
            $recipe->category_id = $category->id;
            
            //$recipe->user_id = Auth::id();
            $recipe->difficult = $request->difficult;
            
            $recipe->save();
            $recipe_id = $recipe->id;
            
            $ingredients = $request->ingredient;
            $ingredients = explode(", ",$ingredients);
            $ingredient_to_recipes = Ingredient_to_recipe::where('recipe_id',$id)->get();
          
            if(($key=array_search("",$ingredients)) != false){
                    
                          unset($ingredients[$key]);
                 }
            print_r($ingredients);
            
            foreach($ingredient_to_recipes as $ingredient_to_recipe){
                
                $ingredient_name = Ingredient::find($ingredient_to_recipe->ingredient_id);
            
         
                if(($key=array_search($ingredient_name->name,$ingredients)) !== false){
                        
                          unset($ingredients[$key]);
                    }else{
                      $destroy_inToRecipe= Ingredient_to_recipe::find($ingredient_to_recipe->id);
                    
                     $destroy_inToRecipe->delete();
                }
                
                
               
                
            }
            
            
            foreach($ingredients as $ingredient){
                $ingredient_to_recipe = new Ingredient_to_recipe;
                if(!empty($ingredient)){
                    if(Ingredient::where('name',$ingredient)->count()==null){
                        $set_ingredient = new Ingredient;
                        $set_ingredient->name = $ingredient;
                        $set_ingredient->save();
                        $ingredient_to_recipe->ingredient_id = $set_ingredient->id;
                    }else{
                        $ingredient_id = Ingredient::where('name',$ingredient)->first();
                        $ingredient_to_recipe->ingredient_id  = $ingredient_id->id;
                    }
                    $ingredient_to_recipe->recipe_id = $recipe_id;
                    $ingredient_to_recipe->save();
                }
            }
            
            if ($request->hasFile('imageToUpload')) {
                if ($request->file('imageToUpload')->isValid()) {
                    if(substr($request->file('imageToUpload')->getMimeType(), 0, 5) == 'image') {
       
    
                     $destinationPath = 'assets/img/recipe';
                    $request->file('imageToUpload')->move($destinationPath, $recipe_id.".jpg");
                    $error_image="";
                    }else{
                        $error_image=" Il file non è un immagine, non è stata caricata!";
                    }
                }   
            }
            if(!isset($error_image)){
                $error_image="";
            }
     
        	return redirect()->route('recipe.show',[$id])->with('status', 'Riccetta Modificata con successo!'.$error_image);
        }else{
            return redirect()->route('recipe.index')->with('status-warning', 'Non hai i permessi per modificare questa ricetta!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $recipe= Recipe::find($id);
        $ingredients_to_recipes = Recipe::find($id)->ingredient_to_recipes;
        
        if(Auth::id()==$recipe->user_id){
            foreach($ingredients_to_recipes as $ingredient_to_recipe ){
                $destroy_inToRecipe= Ingredient_to_recipe::find($ingredient_to_recipe->id);
                    
                $destroy_inToRecipe->delete();
            }
            $recipe->delete();
            
            return redirect()->route('recipe.index')->with('status', 'Hai eliminato la riccetta con successo!');
        }else{
            return redirect()->route('recipe.index')->with('status-warning', 'Non hai i permessi per eliminare questa ricetta!');
        }
    }
}
