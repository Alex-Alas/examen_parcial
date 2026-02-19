<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Book extends Model
{
    use HasFactory;

     protected $fillable = [
        'title',
        'description',
        'isbn',
        'total',
        'available',
        'status'
    ];
}

$book = Book::factory(90)->create();


