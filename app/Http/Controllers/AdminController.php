<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\User;
use App\Recipe;
use App\Ingredient;
use App\Category;
use App\Ingredient_to_recipe;
use App\Setting;

class AdminController extends Controller
{
    protected $paginate;
    
    public function __construct()
    {
        $this->paginate = Setting::first()->paginate_admin;
        
    }
    
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
        $recipes= Recipe::paginate($this->paginate);
        
        
        return view('admin.recipe' ,['recipes' => $recipes]);
    }
    
    public function ingredient()
    {
        $ingredients = Ingredient::paginate($this->paginate);
        
        return view('admin.ingredient' ,['ingredients' => $ingredients]);
    }
    public function ingredientStore(Request $request)
    {
       $this->validate($request, [
        'name' => 'required | between:3,255',

        ]);
        if( Ingredient::where("name",$request->name)->count() == 0 ){
            $ingredient= new Ingredient;
            $ingredient->name = $request->name;
            $ingredient->save();
            
            return redirect()->route('admin.ingredient')->with('status', "Ingrediente aggiunto con successo!");
            
        }else{
            
            return redirect()->back()->with('status-warning', "Ingrediente già presente!");
        }
    
    }
    
    public function ingredientEdit($id)
    {
        $ingredient = Ingredient::find($id);
        
        if($ingredient == null){
            return redirect()->back()->with('status-warning', "Ingrediente non trovato!");
        }else{
            return view('admin.ingredientEdit' ,['ingredient' => $ingredient]);
        }
    }
    public function ingredientUpdate(Request $request, $id){
        $this->validate($request, [
            'name' => 'required | between:3,255'
            ]);
            
        $ingredient = Ingredient::find($id);
        
        if($ingredient == null){
            return redirect()->back()->with('status-warning', "Ingrediente non trovato!");
        }else{
            $cerca = Ingredient::where('name',$request->name)->first();
            if($cerca == null){
            
                $ingredient->name = $request->name;
                $ingredient->save();
                
                return redirect()->route('admin.ingredient')->with('status', "Ingrediente modificato con successo!");
            }else{
                
               return redirect()->back()->with('status-warning', "E' gia presente un ingrediente con questo nome!"); 
            }
        }
    }
    public function ingredientDestroy($id)
    {
        $ingredient = Ingredient::find($id);
        if($ingredient != null){
            $used = Ingredient_to_recipe::where('ingredient_id',$id)->count() ;
            
            if($used == 0){
                $ingredient->delete();
                return redirect()->back()->with('status', "Ingrediente eliminato con successo!");
            }else{
                return redirect()->back()->with('status-warning', "Ci sono ricette che usano questo ingrediente, non è possibile eliminarlo!"); 
            }
        }else{
            return redirect()->back()->with('status-warning', "Ingrediente non trovato!");
        }
        
    }
    
    public function user()
    {
        $users = User::paginate($this->paginate);
        
        return view('admin.user' ,['users' => $users]);
    }
    
    public function category()
    {
        $categories = Category::paginate($this->paginate);
        
        return view('admin.category' ,['categories' => $categories]);
        
    }
    public function categoryEdit($id)
    {
        $cateogry = Category::find($id);
        
        if($cateogry == null){
            return redirect()->back()->with('status-warning', "Categoria non trovata!");
        }else{
            return view('admin.categoryEdit' ,['category' => $cateogry]);
        }
    }
    public function categoryUpdate(Request $request, $id){
        $this->validate($request, [
            'name' => 'required | between:3,255'
            ]);
            
        $category = Category::find($id);
        
        if($category == null){
            return redirect()->back()->with('status-warning', "Categoria non trovata!");
        }else{
            $cerca = Category::where('name',$request->name)->first();
            if($cerca == null){
            
                $category->name = $request->name;
                $category->save();
                
                return redirect()->route('admin.category')->with('status', "Categoria modificata con successo!");
            }else{
                
               return redirect()->back()->with('status-warning', "E' gia presente una Cateogria con questo nome!"); 
            }
        }
    }
    public function categoryDestroy($id)
    {
        $category = Category::find($id);
        if($category != null){
            $used = Recipe::where('category_id',$id)->count() ;
            
            if($used == 0){
                $category->delete();
                return redirect()->back()->with('status', "Cateogria eliminata con successo!");
            }else{
                return redirect()->back()->with('status-warning', "Ci sono ricette appartenenti a questa Categoria, non è possibile eliminarla!"); 
            }
        }else{
            return redirect()->back()->with('status-warning', "Categoria non trovata!");
        }
        
    }
    public function categoryStore(Request $request)
    {
       $this->validate($request, [
        'name' => 'required | between:3,255',

        ]);
        if( Category::where("name",$request->name)->count() == 0 ){
            $category = new Category;
            $category->name = $request->name;
            $category->save();
            
            return redirect()->route('admin.category')->with('status', "Categoria aggiunta con successo!");
            
        }else{
            
            return redirect()->back()->with('status-warning', "Categoria già presente!");
        }
    
    }
    
    public function setting()
    {
        $setting= Setting::first();
        
        return view('admin.setting' ,['setting' => $setting]);
        
    }
    public function settingUpdate(Request $request)
    {
        
         $this->validate($request, [
            'site_name' => 'required | between:3,255',
            'paginate_recipe' => 'required | integer | between:3,30',
            'paginate_admin' => 'required | integer | between:5,50',
            'theme' => 'required | integer | between:1,3',
            ]);
            
        $setting = Setting::first();
        $setting->site_name = $request->site_name;
        $setting->paginate_recipe = $request->paginate_recipe;
        $setting->paginate_admin = $request->paginate_admin;
        $setting->theme = $request->theme;
        $setting->save();
        
        return redirect()->back()->with('status', "Impostazioni modificate con successo!");
    }
}
