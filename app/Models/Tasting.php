<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tasting extends Model
{
    use HasFactory;

    protected $fillable = [
        'recipee_id',
        'employee_id',
        'date',
        'rating',
    ];

    public function recipee()
    {
        return $this->belongsTo(Recipee::class);
    }

    public function employee()
    {
        return $this->hasOne(Employee::class);
    }
}
