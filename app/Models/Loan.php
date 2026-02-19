<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Loan extends Model
{
    protected $fillable = [
        'name',
        'loan_date',
        'return_date',
        'books_id'
    ];

    public function book(): BelongsTo
    {
        return $this->belongsTo(Book::class);
    }
}
