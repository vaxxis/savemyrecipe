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

    // Public routes
    Route::get('/', 'HomeController@index');
    Route::get('/r/{slug}', 'HomeController@showRecipe');
    Route::get('/course/{course}', 'HomeController@filterByCourse');

    Route::auth(); // authentication routes

	Route::resource('recipes', 'RecipesController');
	Route::get('recipes/{id}/delete', 'RecipesController@destroy');

    Route::resource('ingredients', 'IngredientsController');
    Route::get('ingredients/{id}/delete', 'IngredientsController@destroy');

    Route::resource('ingredienttypes', 'IngredientTypesController');
    Route::get('ingredienttypes/{id}/delete', 'IngredientTypesController@destroy');

});
