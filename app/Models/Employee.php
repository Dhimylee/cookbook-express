<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'rg',
        'admission_date',
        'demission_date',
        'salary',
        'role_id',
        'fantasy_name',
        'user_id'
    ];

    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function user()
    {
        return $this->hasOne(User::class);
    }

    public function restaurant()
    {
        return $this->hasMany(Restaurant::class);
    }

    public function experience()
    {
        return $this->hasMany(Employee_experience::class, 'employee_id', 'id');
    }
}
