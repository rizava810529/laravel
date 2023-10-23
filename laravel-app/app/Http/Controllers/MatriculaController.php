<?php

namespace App\Http\Controllers;

use App\Models\Matricula;
use Illuminate\Http\Request;

class MatriculaController extends Controller
{
    public function index()
    {
        return Matricula::all();
    }

    public function store(Request $request)
    {
        $request->validate([
            'alumno_id' => 'required',
            'curso_id' => 'required',
            'asistencia' => 'required|in:A,T,F',
        ]);

        return Matricula::create($request->all());
    }

    public function show(Matricula $matricula)
    {
        return $matricula;
    }

    public function update(Request $request, Matricula $matricula)
    {
        $request->validate([
            'alumno_id' => 'required',
            'curso_id' => 'required',
            'asistencia' => 'required|in:A,T,F',
        ]);

        $matricula->update($request->all());

        return $matricula;
    }

    public function destroy(Matricula $matricula)
    {
        $matricula->delete();
        return response()->json(['message' => 'Matrícula eliminada correctamente'], 200);
    }
}
