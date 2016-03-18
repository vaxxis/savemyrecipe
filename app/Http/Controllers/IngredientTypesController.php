<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\IngredientType;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;

class IngredientTypesController extends Controller
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
        $ingredienttypes = IngredientType::paginate(15);

        return view('ingredienttypes.index', compact('ingredienttypes'));
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255|unique:ingredient_types,name',
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('ingredienttypes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $this->validate($request, ['name' => 'required|max:255|unique:ingredient_types']);

        $ingredientType = IngredientType::create($request->all());

        Session::flash('flash_message', "IngredientType <strong>{$ingredientType->name}</strong> added!");

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
        $ingredienttype = IngredientType::findOrFail($id);

        return view('ingredienttypes.show', compact('ingredienttype'));
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
        $ingredienttype = IngredientType::findOrFail($id);

        return view('ingredienttypes.edit', compact('ingredienttype'));
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
        $ingredientType = IngredientType::findOrFail($id);

        $this->validate($request, ['name' => 'required|max:255|unique:ingredient_types']);

        $ingredientType->update($request->all());

        Session::flash('flash_message', "IngredientType <strong>{$ingredientType->name}</strong> updated!");

        return redirect('ingredienttypes');
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
        $ingredientType = IngredientType::findOrFail($id);

        IngredientType::destroy($id);

        Session::flash('flash_message', "IngredientType <strong>{$ingredientType->name}</strong> deleted!");

        return redirect('ingredients');
    }

}
