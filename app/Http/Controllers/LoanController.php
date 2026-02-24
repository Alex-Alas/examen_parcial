<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreLoanRequest;
use App\Http\Requests\UpdateLoanRequest;
use App\Http\Resources\LoanResource;
use App\Models\Book;
use App\Models\Loan;
use Illuminate\Http\Request;

class LoanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $loans = Loan::with('book')->get();

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
        $data = $request->validated();

        // Buscar el libro por ISBN
        $book = Book::where('isbn', $data['isbn'])->first();

        if (! $book || $book->available <= 0) {
            return response()->json(['error' => 'No hay copias disponibles para este libro.'], 422);
        }

        // Agregar fecha/hora actual si no se proporciona
        if (! isset($data['loan_date'])) {
            $data['loan_date'] = now();
        }

        // Asignar la FK del libro y crear el préstamo
        $data['books_id'] = $book->id;
        $loan = Loan::create($data);

        // Reducir cantidad de copias disponibles en 1
        $book->decrement('available');

        // Si la cantidad de copias llega a 0, actualizar el estado del libro
        if ($book->available <= 0) {
            $book->status = false;
            $book->save();
        }

        return response()->json(LoanResource::make($loan->load('book')), 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Loan $loan)
    {
        return response()->json(LoanResource::make($loan->load('book')));
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
        // Verificar que no se haya devuelto el libro todavía
        if ($loan->return_date) {
            return response()->json(['error' => 'Este préstamo ya ha sido devuelto.'], 422);
        }

        // Registrar la fecha de devolución
        $loan->update(['return_date' => now()]);

        // Incrementar las copias disponibles del libro
        $book = $loan->book;
        $book->increment('available');

        // Si el libro estaba marcado como no disponible, actualizar el estado
        if ($book->available > 0) {
            $book->status = true;
            $book->save();
        }

        return response()->json(LoanResource::make($loan->load('book')));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Loan $loan)
    {
        //
    }
}
