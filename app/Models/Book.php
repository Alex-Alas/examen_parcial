<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Book extends Model
{
    protected $fillable = [
        'title',
        'description',
        'isbn',
        'total',
        'available',
        'status',
    ];

    public function loans(): HasMany
    {
        return $this->hasMany(Loan::class, 'books_id');
    }
}
