<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Log;

class LogsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Log::create([
            'user_id' => 1,
            'action' => 'Creación de usuario',
            'details' => 'Se creó un nuevo usuario con el nombre de usuario "juan123".',
        ]);

        Log::create([
            'user_id' => 2, 
            'action' => 'Actualización de perfil',
            'details' => 'El usuario actualizó su dirección de correo electrónico.',
        ]);

        Log::create([
            'user_id' => null, 
            'action' => 'Eliminación de producto',
            'details' => 'Se eliminó un producto con el ID 5 del sistema.',
        ]);
    }
}
