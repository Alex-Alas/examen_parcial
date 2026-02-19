<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Endpoints:
// TODO: GET /books
Route::get( // Lista
    'books', 
    [BookController::class, 'index']
);

// TODO: filtros: titulo, isbn, status
Route::get( // Obtener 
    'books/{book}', // puede ser isbn, titulo o status
    [BookController::class, 'show']
);

// TODO: POST /loans
Route::post( // Crear loan
    'loans', // detallar en JSON: nombre de solicitante, fecha/hora y libro
    [LoanController::class, 'store']
); // Si no hay existencias, retornar error 422

// TODO: POST /returns/{loan_id}
Route::post( // crear return
    'returns/{loan_id}',
    [LoanController::class, 'store']
);