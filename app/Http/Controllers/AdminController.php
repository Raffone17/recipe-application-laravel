<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\User;
use App\Recipe;
use App\Ingredient;
use App\Category;

class AdminController extends Controller
{
    
    public function index()
    {
        $users = User::all()->count();
        $recipes = Recipe::all()->count();
        $ingredients = Ingredient::all()->count();
        $categories = Category::all();
        
        
        
        return view('admin.index', [
            'categories'=>$categories,
            'recipes' => $recipes,
            'users' => $users,
            'ingredients' => $ingredients,
            ]);
    }
    
    public function recipe()
    {
        $recipes= Recipe::paginate(25);
        
        
        return view('admin.recipe' ,['recipes' => $recipes]);
    }
    
    public function ingredient()
    {
        $ingredients = Ingredient::paginate(25);
        
        return view('admin.ingredient' ,['ingredients' => $ingredients]);
    }
    
    public function user()
    {
        $users = User::paginate(25);
        
        return view('admin.user' ,['users' => $users]);
    }
}
