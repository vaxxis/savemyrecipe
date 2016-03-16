<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Ingredient;
use App\IngredientType;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;

class IngredientsController extends Controller
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
        $ingredients = Ingredient::with('ingredienttype')
                                 ->orderBy('name', 'asc')
                                 ->paginate(10);

        return view('ingredients.index', compact('ingredients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $ingredientTypesSelect = IngredientType::lists('name','id');
        
        return view('ingredients.create', compact('ingredientTypesSelect'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $this->validate($request, ['name' => 'required|max:255|unique:ingredients']);

        Ingredient::create($request->all());

        Session::flash('flash_message', 'Ingredient added!');

        return redirect('ingredients');
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
        $ingredient = Ingredient::findOrFail($id);

        return $ingredient;
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
        $ingredient = Ingredient::findOrFail($id);

        $ingredientTypesSelect = IngredientType::lists('name','id');

        return view('ingredients.edit', compact('ingredientTypesSelect', 'ingredient'));
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
        $ingredient = Ingredient::findOrFail($id);

        $this->validate($request, ['name' => 'required|max:255|unique:ingredients']);

        $ingredient->update($request->all());

        Session::flash('flash_message', 'Ingredient updated!');

        return redirect('ingredients');
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
        Ingredient::destroy($id);

        Session::flash('flash_message', 'Ingredient deleted!');

        return redirect('ingredients');
    }

}
