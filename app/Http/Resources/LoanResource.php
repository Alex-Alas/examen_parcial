<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class LoanResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        // retorna: nombre del solicitante, fechahora del préstamo y titulo del libro
        // con base en la relación entre Loan y Book, claro :P
        return [
            'nombre_solicitante' => $this->borrower_name,
            'fechahora_prestamo' => $this->loan_date,
            'titulo_libro' => $this->book ? $this->book->title : null,
        ];
    }
}
