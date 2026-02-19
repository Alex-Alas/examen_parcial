<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Http\Requests\StoreBookRequest;
use App\Http\Requests\UpdateBookRequest;
use App\Http\Resources\BookResource;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
<<<<<<< Updated upstream
        // Validar datos de entrada del request
        $request->validate([
            'title' => 'sometimes|string|max:255',
            'author' => 'sometimes|string|max:255',
            'isbn' => 'sometimes|string|max:13',
        ]);
    
        $query = Book::query();

        // Filtros (title, author, isbn)
=======
        $request->validate([
            'title' => 'sometimes|string|max:255',
            'isbn' => 'sometimes|string|max:13',
            'status' => 'sometimes|boolean',
        ]);
        
        $query = Book::query();

>>>>>>> Stashed changes
        if ($request->has('title')) {
            $query->where('title', 'like', '%' . $request->input('title') . '%');
        }

<<<<<<< Updated upstream
        if ($request->has('author')) {
            $query->where('author', 'like', '%' . $request->input('author') . '%');
        }

        if ($request->has('isbn')) {
            $query->where('isbn', 'like', '%' . $request->input('isbn') . '%');
=======
        if ($request->has('isbn')) {
            $query->where('isbn', $request->isbn);
        }

        if ($request->has('status')) {
            $query->where('status', $request->status);
>>>>>>> Stashed changes
        }

        $books = $query->get();

<<<<<<< Updated upstream
        return response()->json(BookResource::collection($books));
=======
        return response()->json($books);
        // TODO: agregar el book resource para formatear la respuesta
        // return response()->json(BookResource::collection($books));
>>>>>>> Stashed changes
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
    public function store(StoreBookRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Book $book)
    {
        return response()->json(BookResource::make($book));
        // return response()->json($book);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBookRequest $request, Book $book)
    {
        // 
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        //
    }
}
