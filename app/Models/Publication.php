<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Publication extends Model
{
    use HasFactory;

    protected $fillable = [
        'book_id',
        'recipee_id',
    ];

    public function book()
    {
        return $this->hasOne(Book::class);
    }

    public function recipee()
    {
        return $this->hasOne(Recipee::class);
    }
}
