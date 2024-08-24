<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    use HasFactory;

    protected $fillable = [
       'name',
        'address',
        'phone',
    ];

    public function book() {
        return $this->hasMany(Book::class);
    }

}
