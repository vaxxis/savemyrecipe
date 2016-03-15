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


Route::group(['middleware' => ['web']], function () {

    // PUBLIC ROUTES
    Route::get('/', 'PagesController@index');
    Route::get('/all', 'PagesController@showPublicRecipes');
    Route::get('/all/{course}', 'PagesController@filterByCourse');
    Route::get('/r/{slug}', 'PagesController@showRecipe');
    Route::get('@{slugOrId}', 'PagesController@showUser');



    // AUTHENTICATED ROUTES

    Route::auth();

    Route::get('users/{id}/edit', 'UsersController@edit');
    Route::put('users/{user}', 'UsersController@update')->name('users.update');

	Route::resource('recipes', 'RecipesController');
	Route::get('recipes/{id}/delete', 'RecipesController@destroy');

    Route::resource('ingredients', 'IngredientsController');
    Route::get('ingredients/{id}/delete', 'IngredientsController@destroy');

    Route::resource('ingredienttypes', 'IngredientTypesController');
    Route::get('ingredienttypes/{id}/delete', 'IngredientTypesController@destroy');

});
