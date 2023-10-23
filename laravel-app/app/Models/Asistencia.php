<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asistencia extends Model
{
    use HasFactory;
    protected $table ='asistencias';

    protected $fillable = ['alumno_id', 'curso_id', 'asistencia'];

    // Relación con el modelo Alumno
    public function alumno()
    {
        return $this->belongsTo(Alumno::class);
    }

    // Relación con el modelo Curso
    public function curso()
    {
        return $this->belongsTo(Curso::class);
    }



}
