<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlumnoController;
use App\Http\Controllers\DocenteController;
use App\Http\Controllers\CursoController;
use App\Http\Controllers\MatriculaController;
use App\Http\Controllers\AsistenciaController;



Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});



//XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX

/* Route::get('/api/alumnos', 'AlumnoController@index');
Route::get('/api/alumnos/{id}', 'AlumnoController@show');
Route::post('/api/alumnos', 'AlumnoController@store');
Route::put('/api/alumnos/{id}', 'AlumnoController@update');
Route::delete('/api/alumnos/{id}', 'AlumnoController@destroy');
Route::post('/api/alumnos/{alumnoId}/cursos/{cursoId}', 'AlumnoController@matricula');
Route::post('/api/alumnos/{alumnoId}/asistencia', 'AlumnoController@registrarAsistencia');
 */

/* 
 Route::resource('alumnos', AlumnoController::class);
 Route::resource('docentes', DocenteController::class);
 Route::resource('cursos', CursoController::class);
 Route::resource('matriculas', MatriculaController::class);
 Route::resource('asistencias', AsistenciaController::class);
 */

 Route::controller(AlumnoController::class)->group(function () {
    Route::get('/alumnos', 'index');
    Route::get('/alumno/{id}', 'show');
    Route::post('/alumno', 'store');
    Route::put('/alumno/{id}', 'update');
    Route::delete('/alumno/{id}', 'destroy');
    
    // Ruta para matricular al alumno en un curso
    Route::post('/alumno/{alumnoId}/matricular/{cursoId}', 'm */atricularAlumnoEnCurso');

    
    // Ruta para registrar la asistencia
    Route::post('/alumno/{alumnoId}/registrar-asistencia/{cursoId}', 'registrarAsistencia');
}); 
//XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX

Route::controller(DocenteController::class)->group(

    function () {
        Route::get('/docentes', 'index');
        Route::get('/docente/{id}','show');
        Route::post('/docente/{id}', 'store');
        Route::put('/docente/{id}', 'update');
        Route::delete('/docente/{id}', 'destroy');
    }
);

// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
Route::controller(CursoController::class)->group(

    function () {
        Route::get('/cursos', 'index');
        Route::get('/curso/{id}','show');
        Route::post('/curso/{id}', 'store');
        Route::put('/curso/{id}', 'update');
        Route::delete('/curso/{id}', 'destroy');
    }
);
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
Route::controller(MatriculaController::class)->group(

    function () {
        Route::get('/matriculas', 'index');
        Route::get('/matricula/{id}','show');
        Route::post('/matricula/{id}', 'store');
        Route::put('/matricula/{id}', 'update');
        Route::delete('/matricula/{id}', 'destroy');
    }
);

// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
Route::controller(AsistenciaController::class)->group(

    function () {
        Route::get('/asistencias', 'index');
        Route::get('/asistencia/{id}','show');
        Route::post('/asistencia/{id}', 'store');
        Route::put('/asistencia/{id}', 'update');
        Route::delete('/asistencia/{id}', 'destroy');
    }
);
