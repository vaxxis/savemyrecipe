<?php

use Illuminate\Database\Seeder;
use App\Recipe;

class RecipesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('recipes')->delete();
        DB::table('ingredient_recipe')->delete();

        $ingredients = App\Ingredient::lists('id');

        factory(Recipe::class, 300)->create()->each(function($recipe) use($ingredients) {

            // get a random number of ingredients
            $tempIngredients = $ingredients->random(rand(2, $ingredients->count() / 2));

            foreach ($tempIngredients as $ingredient_id) {
                DB::table('ingredient_recipe')->insert([
                  'ingredient_id' => $ingredient_id,
                  'recipe_id' => $recipe->id,
                ]);
            }
        });
    }
}
