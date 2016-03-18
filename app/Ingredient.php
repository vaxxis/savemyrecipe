<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ingredient extends Model
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'ingredients';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'ingredient_type_id'];

    /**
     * The recipes that belong to the ingredient.
     */
    public function recipes()
    {
        return $this->belongsToMany(Recipe::class);
    }

    public function ingredientType()
    {
        return $this->belongsTo(IngredientType::class);
    }

    public static function ingredientsMultiSelect()
    {
        $options = [];
        $results = IngredientType::with('ingredients')->get(['id', 'name']);

        foreach ($results as $ingType) {
            foreach ($ingType->ingredients as $ing) {
                $options[$ingType->name][$ing->id] = $ing->name;
            }
        }

        return $options;
    }

    public function __toString()
    {
        return $this->name;
    }
}
