<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Recipe;
use App\Ingredient;
use App\IngredientType;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;

class RecipesController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $recipes = Recipe::paginate(15);

        return view('recipes.index', compact('recipes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $recipe = new Recipe;
        $ingredientTypes = IngredientType::with('ingredients')->get();

        return view('recipes.create', compact('recipe', 'ingredientTypes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $this->validate($request, ['name' => 'required']);

        $data = $request->all();
        $data['user_id'] = \Auth::user()->id;
        $ingredients = $data['ingredients'];
        $recipe = Recipe::create($data);

        $recipe->ingredients()->attach($ingredients);

        Session::flash('flash_message', 'Recipe added!');

        return redirect('recipes');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return Response
     */
    public function show($id)
    {
        $recipe = Recipe::findOrFail($id);

        return view('recipes.show', compact('recipe'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $recipe = Recipe::findOrFail($id);
        $ingredientTypes = IngredientType::with('ingredients')->get();

        return view('recipes.edit', compact('recipe', 'ingredientTypes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     *
     * @return Response
     */
    public function update($id, Request $request)
    {
        
        $recipe = Recipe::findOrFail($id);
        
        $ingredients = $request->all()['ingredients'];
        $recipe->ingredients()->attach($ingredients);

        $recipe->update($request->all());


        Session::flash('flash_message', 'Recipe updated!');

        return redirect('recipes');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        Recipe::destroy($id);

        Session::flash('flash_message', 'Recipe deleted!');

        return redirect('recipes');
    }

}
