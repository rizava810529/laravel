<?php

namespace App\Http\Controllers;

use App\Models\Curso;
use Illuminate\Http\Request;

class CursoController extends Controller
{
    public function index()
    {
        $cursos = Curso::all();
        return response()->json(['cursos' => $cursos]);
    }

    public function store(Request $request)
    {
        // Validar los datos ingresados en el formulario
        $request->validate([
            'nombre' => 'required',
            'descripcion' => 'required',
        ]);

        // Crear un nuevo curso en la base de datos
        $curso = Curso::create([
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
        ]);

        return response()->json(['curso' => $curso, 'message' => 'Curso creado con éxito']);
    }


    public function show($id)
    {
        $curso = Curso::find($id);

    	if (!$curso) {
        return response()->json(['message' => 'Curso no encontrado'], 404);
    }

    return response()->json(['curso' => $curso]);
    }


    public function update(Request $request, $id)
    {
        // Validar los datos ingresados en el formulario
        $request->validate([
            'nombre' => 'required',
            'descripcion' => 'required',
        ]);

        // Actualizar los datos del curso en la base de datos
        $curso = Curso::find($id);
        $curso->nombre = $request->nombre;
        $curso->descripcion = $request->descripcion;
        $curso->save();

        return response()->json(['curso' => $curso, 'message' => 'Curso actualizado con éxito']);
    }

    public function destroy($id)
    {
        // Eliminar el curso de la base de datos
        Curso::destroy($id);

        return response()->json(['message' => 'Curso eliminado con éxito']);
    }
}
