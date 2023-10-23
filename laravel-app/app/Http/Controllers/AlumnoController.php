<?php

namespace App\Http\Controllers;

use App\Models\Alumno;
use Illuminate\Http\Request;
use App\Http\Resources\AlumnoResource;
use App\Models\Curso;


class AlumnoController extends Controller
{
    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        /* return Usuario::all(); */

        
        $alumno =new Alumno();
        return $alumno->all(); 
       
    }

    
    public function create()
    {
        //
    }
    
    public function store(Request $request)
    {
        // Validar los datos ingresados en el formulario
        $request->validate([
            'nombre' => 'required',
            'email' => 'required|email|unique:alumnos',
        ]);

        // Crear un nuevo alumno en la base de datos
        Alumno::create([
            'nombre' => $request->nombre,
            'email' => $request->email,
        ]);

        return redirect('/alumnos')->with('success', 'Alumno creado con éxito.');
    }
    
    public function show(string $id)
    {
        return Alumno::where('id',$id)->get();
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Alumno $alumno)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
{
    // Validar los datos ingresados en el formulario
    $request->validate([
        'nombre' => 'required',
        'email' => 'required|email|unique:alumnos,email,' . $id,
    ]);

    // Actualizar los datos del alumno en la base de datos
    Alumno::where('id', $id)->update([
        'nombre' => $request->nombre,
        'email' => $request->email,
    ]);

    return redirect('/alumnos')->with('success', 'Alumno actualizado con éxito.');
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $alumno = Alumno::find($id);
        $alumno->delete();
        return "Registro Eliminado Correctamente";
    }
    //XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
    public function matricula(Request $request, $alumnoId, $cursoId)
    {
        $alumno = Alumno::find($alumnoId);
        $curso = Curso::find($cursoId);
    
        if (!$alumno || !$curso) {
            return response()->json(['message' => 'Alumno o curso no encontrado'], 404);
        }
    
        // Comprobar si el alumno ya está matriculado en el curso
        if ($alumno->cursos->contains($curso)) {
            return response()->json(['message' => 'El alumno ya está matriculado en este curso']);
        }
    
        // Matricular al alumno en el curso
        $alumno->cursos()->attach($curso);
    
        return response()->json(['message' => 'Alumno matriculado en el curso con éxito']);
    }
    //XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
    
    public function registrarAsistencia(Request $request, $alumnoId)
    {
        // Lógica para registrar la asistencia del alumno en un curso

	// Buscar al alumno y el curso
        $alumno = Alumno::find($alumnoId);
        $curso = Curso::find($cursoId);

        if (!$alumno || !$curso) {
            return response()->json(['message' => 'Alumno o curso no encontrado'], 404);
        }

        // Verificar si el alumno está matriculado en el curso
        if (!$alumno->cursos->contains($curso)) {
            return response()->json(['message' => 'El alumno no está matriculado en este curso'], 400);
        }

        // Validar la opción de asistencia (A, T, F)
        $asistencia = $request->input('asistencia');

        if (!in_array($asistencia, ['A', 'T', 'F'])) {
            return response()->json(['message' => 'Opción de asistencia no válida'], 400);
        }

        // Registrar la asistencia del alumno en el curso
        $nuevaAsistencia = new Asistencia([
            'asistencia' => $asistencia,
        ]);

        $curso->asistencias()->save($nuevaAsistencia);
        $alumno->asistencias()->save($nuevaAsistencia);

        return response()->json(['message' => 'Asistencia registrada con éxito']);
    }




}
