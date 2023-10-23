<?php

namespace App\Http\Controllers;

use App\Models\Asistencia;
use Illuminate\Http\Request;

class AsistenciaController extends Controller
{
    public function index()
    {
        $asistencias = Asistencia::all();
        return response()->json(['asistencias' => $asistencias]);
    }

   public function store(Request $request)
{
    // Validar los datos ingresados en la solicitud
    $request->validate([
        'alumno_id' => 'required',
        'curso_id' => 'required',
        'asistencia' => 'required|in:A,T,F',
    ]);

    // Crear una nueva asistencia en la base de datos
    $asistencia = Asistencia::create([
        'alumno_id' => $request->input('alumno_id'),
        'curso_id' => $request->input('curso_id'),
        'asistencia' => $request->input('asistencia'),
    ]);

    return response()->json(['asistencia' => $asistencia, 'message' => 'Asistencia registrada con éxito']);
}


    public function show($id)
    {
        $asistencia = Asistencia::find($id);
        return response()->json(['asistencia' => $asistencia]);
    }

    public function update(Request $request, $id)
    {
        // Validar los datos ingresados en la solicitud
        $request->validate([
            'alumno_id' => 'required',
            'curso_id' => 'required',
            'asistencia' => 'required|in:A,T,F', // Opciones de asistencia válidas
        ]);

        // Actualizar los datos de la asistencia en la base de datos
        $asistencia = Asistencia::find($id);
        $asistencia->alumno_id = $request->alumno_id;
        $asistencia->curso_id = $request->curso_id;
        $asistencia->asistencia = $request->asistencia;
        $asistencia->save();

        return response()->json(['asistencia' => $asistencia, 'message' => 'Asistencia actualizada con éxito']);
    }

    public function destroy($id)
    {
        // Eliminar la asistencia de la base de datos
        Asistencia::destroy($id);

        return response()->json(['message' => 'Asistencia eliminada con éxito']);
    }
}
