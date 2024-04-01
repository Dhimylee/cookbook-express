<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recipee extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'employee_id',
        'creation_date',
        'portions',
        'category_id',
        'published',
    ];

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function ingredient_recipees()
    {
        return $this->hasMany(Ingredient_recipee::class);
    }

    public function tasting()
    {
        return $this->hasOne(Tasting::class);
    }

    public function publications()
    {
        return $this->hasMany(Publication::class);
    }
}
