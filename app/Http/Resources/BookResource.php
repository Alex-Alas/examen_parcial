<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BookResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
    // retorna en el siguiente orden: titulo, descripción, ISBN, copias totales
    // copias disponibles y estado (boolean)
    return [
        'titulo' => $this->title,
        'descripción' => $this->description,
        'ISBN' => $this->isbn,
        'copias_totales' => $this->total_copies,
        'copias_disponibles' => $this->available_copies,
        'estado' => $this->available_copies > 0
        ];
    }
}
