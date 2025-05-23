<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $table = "books";
    protected $id = "id";
    protected $fillable = [
        'category_id',
        'book_title',
        'author_name',
        'price',
        'description',
        'quantity',
        'book_image',
        'author_image',
       
    ];

    public function category()
    {
         return $this->belongsTo(Category::class);
    }

    public function borrows()
{
    return $this->hasMany(Borrow::class);
}

}
