<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Asistencia>
 */
class AsistenciaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'alumno_id' => $this->faker->numberBetween(1, 100), // Rango de IDs de alumnos
            'curso_id' => $this->faker->numberBetween(1, 50), // Rango de IDs de cursos
            'asistencia' => $this->faker->randomElement(['A', 'T', 'F']),
        ];
    }
}
