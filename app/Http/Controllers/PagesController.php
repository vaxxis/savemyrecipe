<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;

use App\User;
use App\Recipe;


class PagesController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.home');
    }

    public function searchPublicRecipes(Request $request)
    {
        $term = $request->input('term');

        $recipes = Recipe::with('user', 'ingredients')
                         ->where('name', 'LIKE', "%{$term}%")
                         ->orWhere('description', 'LIKE', "%{$term}%")
                         ->paginate(10);

        return view('pages.recipes', compact('recipes', 'term'));
    }

    public function showPublicRecipes()
    {
        $recipes = Recipe::getPublished();

        return view('pages.recipes', compact('recipes'));
    }

    public function filterByCourse($course)
    {
        $recipes = Recipe::getPublishedByCourse($course);
        return view('pages.recipes', compact('recipes', 'course'));
    }

    public function showRecipe($slug)
    {
        $recipe = Recipe::findBySlugOrIdOrFail($slug);
        $recipe->load('ingredients', 'user');

        return view('recipes.show', compact('recipe'));
    }

    public function showUser($slug)
    {
        $user = User::findBySlugOrIdOrFail($slug);
        $recipes = Recipe::getPublishedByUser($user->id);

        return view('users.show', compact('user', 'recipes'));
    }
}
