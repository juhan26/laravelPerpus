<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        "title",
        "category_id",
        "author_id",
        "publisher_id",
        "publisher_year",
    ];

    public function category() {
        return $this->belongsTo(Category::class, "category_id");
    }

    public function author() {
        return $this->belongsTo(Author::class,"author_id");
    }

    public function publisher() {
        return $this->belongsTo(Publisher::class,"publisher_id");
    }
}
