<?php

use Illuminate\Database\Seeder;

use App\Ingredient;
use App\IngredientType;

class IngredientsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('ingredients')->delete();
        DB::table('ingredient_types')->delete();

        $condimenti = IngredientType::create(['name' => 'Condimenti']);
        $condimenti->ingredients()->save(new Ingredient(['name' => 'Sale']));
        $condimenti->ingredients()->save(new Ingredient(['name' => 'Pepe']));
        $condimenti->ingredients()->save(new Ingredient(['name' => 'Zucchero']));
        $condimenti->ingredients()->save(new Ingredient(['name' => 'Aneto']));

   		$farine = IngredientType::create(['name' => 'Farine']);
        $farine->ingredients()->save(new Ingredient(['name' => 'Farina 00']));
        $farine->ingredients()->save(new Ingredient(['name' => 'Farina di farro']));
        $farine->ingredients()->save(new Ingredient(['name' => 'Farina biologica ai cereali']));

   		$liquidi = IngredientType::create(['name' => 'Liquidi']);
        $liquidi->ingredients()->save(new Ingredient(['name' => 'Acqua']));
        $liquidi->ingredients()->save(new Ingredient(['name' => 'Latte']));
        $liquidi->ingredients()->save(new Ingredient(['name' => 'Olio']));

   		$verdure = IngredientType::create(['name' => 'Verdure']);
        $verdure->ingredients()->save(new Ingredient(['name' => 'Zucchine']));
        $verdure->ingredients()->save(new Ingredient(['name' => 'Pomodori']));
        $verdure->ingredients()->save(new Ingredient(['name' => 'Melanzane']));
    }
}
