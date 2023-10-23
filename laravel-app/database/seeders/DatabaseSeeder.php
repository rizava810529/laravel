<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\Alumno::factory(20)->create();
        \App\Models\Docente::factory(20)->create();
        \App\Models\Curso::factory(20)->create();
        \App\Models\Matricula::factory(20)->create();
    }
}
