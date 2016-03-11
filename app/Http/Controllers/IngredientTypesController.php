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
        $this->validate($request, ['name' => 'required', ]);

        IngredientType::create($request->all());

        Session::flash('flash_message', 'IngredientType added!');

        return redirect('ingredienttypes');
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
        $this->validate($request, ['name' => 'required', ]);

        $ingredienttype = IngredientType::findOrFail($id);
        $ingredienttype->update($request->all());

        Session::flash('flash_message', 'IngredientType updated!');

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
        IngredientType::destroy($id);

        Session::flash('flash_message', 'IngredientType deleted!');

        return redirect('ingredienttypes');
    }

}
