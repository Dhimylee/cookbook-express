<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ingredient_recipe extends Model
{
    use HasFactory;

    protected $fillable = [
        'ingredient_id',
        'recipe_id',
        'measure_id',
        'quantity',
    ];

    public function ingredient()
    {
        return $this->hasOne(Ingredient::class);
    }

    public function recipe()
    {
        return $this->hasOne(Recipe::class);
    }

    public function measure()
    {
        return $this->hasOne(Measure::class);
    }
}
