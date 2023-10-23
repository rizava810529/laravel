<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class LrdGenerate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:lrd-generate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Ejecutar una solicitud HTTP desde un comando personalizado.';

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle()
    {
        $response = Http::get('http://127.0.0.1:8000/api/alumno/15
        ');

        if ($response->successful()) {
            $data = $response->json();
            // Realiza acciones con los datos obtenidos
            $this->info('Solicitud exitosa. Datos recibidos: ' . json_encode($data));
        } else {
            $statusCode = $response->status();
            $errorData = $response->json();
            // Realiza acciones de manejo de errores
            $this->error('Error ' . $statusCode . ': ' . json_encode($errorData));
        }
    }
}
