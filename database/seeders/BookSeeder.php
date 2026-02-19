<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $books = [
            [
                'title' => 'Don Quijote de la Mancha',
                'description' => 'Aventuras de un caballero loco',
                'isbn' => '9788424115531',
                'total' => 5,
                'available' => 5,
                'status' => 1
            ],
            [
                'title' => 'Cien años de soledad',
                'description' => 'Historia de la familia Buendía',
                'isbn' => '9780307350435',
                'total' => 3,
                'available' => 3,
                'status' => 1
            ],
            [
                'title' => 'Orgullo y Prejuicio',
                'description' => 'Novela de costumbres y amor',
                'isbn' => '9788467040418',
                'total' => 4,
                'available' => 4,
                'status' => 1
            ],
            [
                'title' => 'Crimen y Castigo',
                'description' => 'Dilemas morales y justicia',
                'isbn' => '9788420651330',
                'total' => 2,
                'available' => 2,
                'status' => 1   
            ],
            [
                'title' => 'El Principito',
                'description' => 'Relato corto sobre la vida',
                'isbn' => '9780156013987',
                'total' => 10,
                'available' => 10,
                'status' => 1
            ],
            [
                'title' => '1984',
                'description' => 'Distopía política y vigilancia',
                'isbn' => '9788466332514',
                'total' => 6,
                'available' => 6,
                'status' => 1
            ],
            [
                'title' => 'La Odisea',
                'description' => 'Viaje épico de Ulises',
                'isbn' => '9788424924515',
                'total' => 3,
                'available' => 3,
                'status' => 1
            ],
            [
                'title' => 'El Gran Gatsby',
                'description' => 'El sueño americano en los años 20',
                'isbn' => '9788467036411',
                'total' => 4,
                'available' => 4,
                'status' => 1
            ],
            [
                'title' => 'Rayuela',
                'description' => 'Novela experimental de Cortázar',
                'isbn' => '9788420431321',
                'total' => 2,
                'available' => 2,
                'status' => 1
            ],
            [
                'title' => 'Hamlet',
                'description' => 'Tragedia de venganza y duda',
                'isbn' => '9788437600123',
                'total' => 5,
                'available' => 5,
                'status' => 1
            ]
        ];
        // insertar los libros en la base de datos
        DB::table('books')->insert($books);
}
}