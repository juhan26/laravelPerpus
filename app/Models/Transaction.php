<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'book_id','borrower','borrow_date', 'return_date','status','description'
    ];

    public function book() {
        return $this->belongsTo(Book::class);
    } // masih ragu
    
}
