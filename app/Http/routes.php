<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

//Route::get('/', function () { return view('welcome');});

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

/*Route::group(['middleware' => ['web']], function () {
    //
});*/

Route::group(['middleware' => 'web'], function () {
    
    Route::auth();
    Route::get('/', 'HomeController@index');
    Route::get('/home', 'HomeController@index');
    Route::get('/recipe', ['as'=>'recipe.index','uses'=>'RecipeController@index']);
    
    
    //***** middleware con accesso solo utenti registrati ******
    Route::group(['middleware' => 'auth'], function () {
        
        //----- Rotte gestione utenti ------
        Route::get('/user/{id}/edit',['as'=>'user.edit','uses'=>'UserController@edit']);
        Route::put('/user/{id}',['as'=>'user.update','uses'=>'UserController@update']);
        Route::get('/user/{id}',['as'=>'user.show','uses'=>'UserController@show']);
        
        
        //----- Rotte gestione ricette -------
        Route::get('/recipe/create', ['as'=>'recipe.create','uses'=>'RecipeController@create']);
        Route::post('/recipe',['as'=>'recipe.store','uses'=> 'RecipeController@store']);
        Route::get('/recipe/{id}/edit',['as'=>'recipe.edit','uses'=>'RecipeController@edit']);
        Route::put('/recipe/{id}',['as'=>'recipe.update','uses'=>'RecipeController@update']);
        Route::delete('/recipe/{id}',['as'=>'recipe.destroy','uses'=>'RecipeController@destroy']);
        
        
        //**** Middleware con accesso solo per amministrazione ****
        Route::group(['middleware' => 'admin'], function(){
            //---- Rotte di amministrazione --------
            
            Route::get('/admin',['as'=>'admin.index','uses'=>'AdminController@index']);
            Route::get('/admin/recipe',['as'=>'admin.recipe','uses'=>'AdminController@recipe']);
            Route::get('/admin/ingredient',['as'=>'admin.ingredient','uses'=>'AdminController@ingredient']);
            Route::get('/admin/user',['as'=>'admin.user','uses'=>'AdminController@user']);
            Route::get('/admin/category' ,['as'=>'admin.category','uses'=>'AdminController@category']);
            
            
            //---- Rotte per modifiche su ingredienti----
            Route::get('/admin/ingredient/{id}/edit',['as'=>'ingredient.edit','uses'=>'AdminController@ingredientEdit']);
            Route::put('/admin/ingredient/{id}',['as'=>'ingredient.update','uses'=>'AdminController@ingredientUpdate']);
            Route::delete('/admin/ingredient/{id}',['as'=>'ingredient.destroy','uses'=>'AdminController@ingredientDestroy']);
            Route::post('/admin/ingredient', ['as'=>'ingredient.store' , 'uses'=>'AdminController@ingredientStore']);
            
            //---- Rotte per modifiche sulle categorie ----
            Route::post('admin/cateogry' ,['as'=>'category.store','uses'=>'AdminController@categoryStore']);
            Route::get('admin/cateogry/{id}/edit' ,['as'=>'category.edit','uses'=>'AdminController@categoryEdit']);
            Route::put('admin/category/{id}' ,['as'=>'category.update','uses'=>'AdminController@categoryUpdate']);
            Route::delete('admin/category/{id}' ,['as'=>'category.destroy','uses'=>'AdminController@categoryDestroy']);
            
            //---- Rotte per modificare le impostazioni -----
            Route::get('/admin/setting' ,['as'=>'admin.setting','uses'=>'AdminController@setting']);
            Route::put('/admin/setting' ,['as'=>'setting.update' ,'uses'=>'AdminController@settingUpdate']);
            
        });
        //***** Fine middleware admin *****
        
    });
    //***** Fine middleware utenti *****
    
    //---------- Rotta visualizza ricetta e gestione ricerca ---------
    Route::get('/recipe/{id}',['as'=>'recipe.show','uses'=>'RecipeController@show']);
    Route::get('/search/title',['as'=>'search.title','uses'=>'SearchController@searchTitle']);
    Route::get('/search/ingredient',['as'=>'search.ingredient','uses'=>'SearchController@searchIngredient']);
    
    
    
});
