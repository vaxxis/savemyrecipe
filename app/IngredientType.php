<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class IngredientType extends Model
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'ingredient_types';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['name'];

    /**
     * Get the comments for the blog post.
     */
    public function ingredients()
    {
        return $this->hasMany(Ingredient::class);
    }

    public function __toString()
    {
        return $this->name;
    }
}
