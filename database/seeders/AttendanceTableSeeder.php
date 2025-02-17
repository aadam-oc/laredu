<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Attendance;
use App\Models\User;
use App\Models\CalendarEvent;

class AttendanceTableSeeder extends Seeder
{
    /**
     * Seed the attendance table.
     */
    public function run(): void
    {
        // Aseguramos que haya usuarios y eventos para asignar asistencia
        $users = User::all();
        $events = CalendarEvent::all();

        // Comprobamos si existen registros en ambas tablas
        if ($users->isEmpty() || $events->isEmpty()) {
            $this->command->info("No hay usuarios o eventos para asignar asistencia.");
            return;
        }

        // Insertamos datos en la tabla de asistencia
        foreach ($users as $user) {
            foreach ($events as $event) {
                // Definimos un estado aleatorio de asistencia
                $status = collect(['present', 'absent', 'late'])->random();

                Attendance::create([
                    'user_id' => $user->id,
                    'calendar_event_id' => $event->id,
                    'status' => $status,
                ]);
            }
        }

    }
}
