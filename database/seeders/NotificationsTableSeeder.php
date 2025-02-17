<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Notification;
use App\Models\User;

class NotificationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Obtener un usuario de ejemplo
        $user = User::first();

        if ($user) {
            // Crear algunas notificaciones
            Notification::create([
                'user_id' => $user->id,
                'type' => 'alert',
                'data' => json_encode(['message' => 'Nuevo evento programado']),
                'is_read' => false,
            ]);

            Notification::create([
                'user_id' => $user->id,
                'type' => 'reminder',
                'data' => json_encode(['message' => 'Recuerda completar tus tareas']),
                'is_read' => true,
            ]);
        }
    }
}
