<?php

use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
});

// Ejemplo: Listar todos los proyectos
Route::get('/projects', function () {
    return Project::all();
});

// Ejemplo: Obtener un proyecto por ID
Route::get('/projects/{project}', function (Project $project) {
    return $project;
});
