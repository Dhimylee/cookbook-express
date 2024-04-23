<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tasting extends Model
{
    use HasFactory;

    protected $fillable = [
        'recipe_id',
        'employee_id',
        'date',
        'rating',
    ];

    public function recipe()
    {
        return $this->belongsTo(Recipe::class);
    }

    public function employee()
    {
        return $this->hasOne(Employee::class);
    }
}
