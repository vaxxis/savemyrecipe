<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Recipe;
use App\IngredientType;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;
use Auth;

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
        $recipes = Recipe::where('user_id', Auth::user()->id)
                         ->paginate(10);

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
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {

        $this->validate($request, ['name' => 'required']);

        $recipe = Auth::user()->recipes()->create($request->all());

        // sync recipe ingredients
        $ingredients = $request->input('ingredients') ?: [];
        $recipe->ingredients()->sync($ingredients);

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
        if (Auth::id() != $id) {
            Session::flash('flash_error', 'Unauthorized action!');
            return back();
        }

        $recipe = Recipe::with('ingredients')->findOrFail($id);
        $ingredientTypes = IngredientType::with('ingredients')->get();

        return view('recipes.edit', compact('recipe', 'ingredientTypes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     *
     * @param Request $request
     * @return Response
     */
    public function update($id, Request $request)
    {
        if (Auth::id() != $id) {
            Session::flash('flash_error', 'Unauthorized action!');
            return back();
        }

        $recipe = Recipe::findOrFail($id);

        $ingredients = $request->input('ingredients') ? $request->input('ingredients') : [];
        $recipe->ingredients()->sync($ingredients);

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
