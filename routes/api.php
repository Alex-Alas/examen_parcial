<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\LoanController;
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
    'returns/{loan}',
    [LoanController::class, 'update']
);

// TODO: GET /loans/{loan_id}
Route::get( // Obtener loan específico
    'loans/{loan}',
    [LoanController::class, 'show']
);

// TODO: GET /loans
Route::get( // Listar loans
    'loans',
    [LoanController::class, 'index']
);
