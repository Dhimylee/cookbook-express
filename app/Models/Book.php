<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'isbn',
        'published_at',
    ];

    public function publication()
    {
        return $this->belongsTo(Publication::class);
    }

    public function publisher()
    {
        return $this->hasOne(Employee::class, 'employee_id', 'id');
    }
}
