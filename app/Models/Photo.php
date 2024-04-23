<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    use HasFactory;

    protected $fillable = [
        'recipe_id',
        'path',
    ];

    public function recipe()
    {
        return $this->hasOne(Recipe::class);
    }
}
