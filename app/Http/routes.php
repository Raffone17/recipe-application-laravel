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
    
    
    
    Route::group(['middleware' => 'auth'], function () {
        
        Route::get('/user/{id}',['as'=>'user.show','uses'=>'UserController@show']);
        Route::get('/recipe/create', ['as'=>'recipe.create','uses'=>'RecipeController@create']);
        Route::post('/recipe',['as'=>'recipe.store','uses'=> 'RecipeController@store']);
        Route::get('/recipe/{id}/edit',['as'=>'recipe.edit','uses'=>'RecipeController@edit']);
        Route::put('/recipe/{id}',['as'=>'recipe.update','uses'=>'RecipeController@update']);
        Route::delete('/recipe/{id}',['as'=>'recipe.destroy','uses'=>'RecipeController@destroy']);
        
        Route::group(['middleware' => 'admin'], function(){
            Route::get('/admin',['as'=>'admin.index','uses'=>'UserController@admin']);
        });
    });
    
    
    Route::get('/recipe/{id}',['as'=>'recipe.show','uses'=>'RecipeController@show']);
    Route::get('/search/title',['as'=>'search.title','uses'=>'SearchController@searchTitle']);
    Route::get('/search/ingredient',['as'=>'search.ingredient','uses'=>'SearchController@searchIngredient']);
    
    //Route::get('/{path?}', function(){ return view("errors.404"); })->where('path', '.+');
    
});
