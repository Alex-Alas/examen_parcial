<?php

use App\Models\Project;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Ejemplo: Listar todos los proyectos
Route::get('/projects', function () {
    return Project::all();
});

// Ejemplo: Obtener un proyecto por ID
Route::get('/projects/{project}', function (Project $project) {
    return $project;
});
