<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ErrorLog;

class ErrorLogsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ErrorLog::create([
            'error_message' => 'Error de conexión con la base de datos.',
            'stack_trace' => 'Stack trace: [stack_trace_here]',
        ]);

        ErrorLog::create([
            'error_message' => 'Error de validación en los datos de entrada.',
            'stack_trace' => 'Stack trace: [stack_trace_here]',
        ]);

        ErrorLog::create([
            'error_message' => 'El servidor no responde dentro del tiempo esperado.',
            'stack_trace' => 'Stack trace: [stack_trace_here]',
        ]);
    }
}
