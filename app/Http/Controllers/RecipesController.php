<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Recipe;
use App\IngredientType;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;
use Image;
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
        $recipes = Recipe::getAllUserRecipes(Auth::id());

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
        $this->validate($request, [
            'name' => 'required|max:255',
            'photo' => 'image|max:10000',
        ]);

        $recipe = Auth::user()->recipes()->create($request->all());

        // save recipe photo (with unique filename)
        if ($request->file('photo')) {
            $recipe->photo = Recipe::handlePhoto($request->file('photo'));
            $recipe->save();
        }


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
        $recipe = Recipe::with('ingredients', 'user')->findOrFail($id);

        $this->authorize($recipe);

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
        $this->validate($request, [
            'name' => 'required|max:255',
            'photo' => 'image|max:10000',
        ]);

        $recipe = Recipe::with('user')->findOrFail($id);
        $previousPhotoPath = $recipe->photo;

        $this->authorize($recipe);

        // associate ingredients to recipe
        $ingredients = $request->input('ingredients') ? $request->input('ingredients') : [];
        $recipe->ingredients()->sync($ingredients);

        $data = $request->all();

        // manage recipe photo
        if ($file = $request->file('photo')) {

            if (file_exists($previousPhotoPath) && is_file($previousPhotoPath)) {
                unlink($previousPhotoPath);
            }

            // save recipe photo (with unique filename)
            $data['photo'] = Recipe::handlePhoto($file);
        }


        $recipe->update($data);


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
        $recipe = Recipe::with('user')->findOrFail($id);

        $this->authorize($recipe);

        // delete previous image
        if (file_exists($recipe->photo) && is_file($recipe->photo)) {
            unlink($recipe->photo);
        }

        Recipe::destroy($id);

        Session::flash('flash_message', "Recipe <strong>#{$recipe->id} ({$recipe->name})</strong> deleted!");

        return redirect('recipes');
    }

    public function deletePhoto($id)
    {
        $recipe = Recipe::with('user')->findOrFail($id);

        $this->authorize($recipe);

        // delete previous image
        if (file_exists($recipe->photo) && is_file($recipe->photo)) {
            unlink($recipe->photo);
        }

        $recipe->photo = null;
        $recipe->save();

        Session::flash('flash_message', 'Recipe photo deleted!');

        return back();
    }

}
