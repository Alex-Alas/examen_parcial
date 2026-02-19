<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreLoanRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
<<<<<<< Updated upstream
            // registra: nombre del solicitante, fecha y hora del préstamo, ISBN del libro
            'borrower_name' => 'required|string|max:255',
            'loan_date' => 'required|date',
            'isbn' => 'required|string|max:13|exists:books,isbn',
=======
            // Registra nombre de solicitante, fechahora y libro prestado.
            'borrower_name' => 'required|string|max:255',
            'loan_date' => 'required|date',
            'book_isn' => 'required|exists:books,isbn',
>>>>>>> Stashed changes
        ];
    }
}
