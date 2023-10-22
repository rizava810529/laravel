<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlumnoController;
use App\Http\Controllers\DocenteController;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::controller(AlumnoController::class)->group(function () {
    Route::get('/alumnos', 'index');
    Route::get('/alumno/{id}', 'show');
    Route::post('/alumno', 'store');
    Route::put('/alumno/{id}', 'update');
    Route::delete('/alumno/{id}', 'destroy');
    
    // Ruta para matricular al alumno en un curso
    Route::post('/alumno/{alumnoId}/matricular/{cursoId}', 'matricularAlumnoEnCurso');
    
    // Ruta para registrar la asistencia
    Route::post('/alumno/{alumnoId}/registrar-asistencia/{cursoId}', 'registrarAsistencia');
});


Route::controller(DocenteController::class)->group(

    function () {
        Route::get('/docentes', 'index');
        Route::get('/docente/{id}','show');
        Route::post('/docente/{id}', 'store');
        Route::put('/docente/{id}', 'update');
        Route::delete('/docente/{id}', 'destroy');
    }
);