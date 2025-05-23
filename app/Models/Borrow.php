<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Borrow extends Model
{
    protected $table = "borrows";
    protected $primaryKey  = "id";
    protected $fillable = [
        
        'book_id',
        'user_id',
        'status',
        
       
    ];

    public function user()
    {
        return $this->belongsTo(User::class); 
    }

    public function book()
    {
        return $this->belongsTo(Book::class);
    }
}
