<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    use HasFactory;

    protected $fillable = [
        'name'
    ];

    public function employees()
    {
        return $this->hasMany(Employee::class);
    }

    public function employee_experience()
    {
        return $this->hasMany(Employee_experience::class, 'restaurant_id', 'id');
    }
}
