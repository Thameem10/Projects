<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OnlineBookStore extends Model
{
    protected $table = 'books'; // Explicitly set table name

    protected $fillable = [
        'title', 
        'author', 
        'category', 
        'price', 
        'is_available'
    ];

    public $timestamps = false; 
}
