<?php

namespace App\Http\Controllers;

use App\Models\Loan;
use App\Http\Requests\StoreLoanRequest;
use App\Http\Requests\UpdateLoanRequest;
use App\Http\Resources\LoanResource;
use Symfony\Component\HttpFoundation\Request;
use App\Models\Book;

class LoanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // Listar loans
        $loans = Loan::all();
        return response()->json(LoanResource::collection($loans));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreLoanRequest $request)
    {
        // validación con formrequest
        $data = $request->validated();

        // verificar que hayan copias disponibles del libro solicitado
        $book = Book::where('isbn', $data['isbn'])->first();
        if (!$book || $book->available_copies <= 0) {
            return response()->json(['error' => 'No hay copias disponibles para este libro.'], 422);
        }
        
        if (!isset($data['loan_date'])) {
            $data['loan_date'] = now();
        }

        //crear el registro en la db
        $loan = Loan::create($data);

        // actualizar el número de copias disponibles del libro
        $book->decrement('available_copies');

        // si se acaban las copias, cambiar el estado a no disponible
        if ($book->available_copies <= 0) {
            $book['status'] = false;
        }
        $book->save();

        return response()->json(LoanResource::make($loan), 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Loan $loan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Loan $loan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateLoanRequest $request, Loan $loan)
    {

        // verificar que no se haya devuelto el libro todavía
        if ($loan->return_date) {
            return response()->json(['error' => 'Este préstamo ya ha sido devuelto.'], 422);
        }

        // registrar la fecha de devolución y actualizar el préstamo
        $data['return_date'] = now();
        $loan->update($data);

        // Si se actualiza la fecha de devolución, incrementar las copias disponibles del libro
        if (isset($data['return_date'])) {
            $book = $loan->book;
            $book->increment('available_copies');
            // Si el libro estaba marcado como no disponible, verificar si ahora hay copias disponibles para actualizar el estado
            if ($book->available_copies > 0) {
                $book['status'] = true;
            }
            $book->save();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Loan $loan)
    {
        //
    }
}
