<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'recipes';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'description', 'user_id'];

    /**
     * The ingredients that belong to the recipe.
     */
    public function ingredients()
    {
        return $this->belongsToMany(Ingredient::class, 'ingredient_recipe');
    }

    /**
     * The user that owns the recipe.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
