<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ingredient extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
    ];

    public function recipes()
    {
        return $this->belongsToMany(Recipe::class, 'ingredient_recipes', 'ingredient_id', 'recipe_id' );
    }

    public function ingredientRecipes()
    {
        return $this->belongsToMany(IngredientRecipe::class);
    }
}
