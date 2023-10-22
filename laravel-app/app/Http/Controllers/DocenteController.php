<?php

namespace App\Http\Controllers;

use App\Models\Docente;
use Illuminate\Http\Request;

class DocenteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $docentes = Docente::all();
        return response()->json(['docentes' => $docentes]);
    }

    public function store(Request $request)
    {
        // Validar los datos ingresados en el formulario
        $request->validate([
            'nombre' => 'required',
            'email' => 'required|email|unique:docentes',
        ]);

        // Crear un nuevo docente en la base de datos
        $docente = Docente::create([
            'nombre' => $request->nombre,
            'email' => $request->email,
        ]);

        return response()->json(['docente' => $docente, 'message' => 'Docente creado con éxito']);
    }

    public function show($id)
    {
        $docente = Docente::find($id);
        return response()->json(['docente' => $docente]);
    }

    public function update(Request $request, $id)
    {
        // Validar los datos ingresados en el formulario
        $request->validate([
            'nombre' => 'required',
            'email' => 'required|email|unique:docentes,email,' . $id,
        ]);

        // Actualizar los datos del docente en la base de datos
        $docente = Docente::find($id);
        $docente->nombre = $request->nombre;
        $docente->email = $request->email;
        $docente->save();

        return response()->json(['docente' => $docente, 'message' => 'Docente actualizado con éxito']);
    }

    public function destroy($id)
    {
        // Eliminar al docente de la base de datos
        Docente::destroy($id);

        return response()->json(['message' => 'Docente eliminado con éxito']);
    }
}
