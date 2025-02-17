<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\CalendarEvent;

class CalendarEventsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CalendarEvent::create([
            'title' => 'Clase de Matemáticas',
            'description' => 'Clase sobre álgebra y geometría',
            'start' => now()->addDays(1)->setTime(9, 0), // Fecha y hora de inicio (ejemplo: mañana a las 9 AM)
            'end' => now()->addDays(1)->setTime(11, 0), // Fecha y hora de finalización (ejemplo: mañana a las 11 AM)
            'user_id' => 1, // ID del usuario que crea el evento (por ejemplo, un profesor)
        ]);

        CalendarEvent::create([
            'title' => 'Reunión de Equipo',
            'description' => 'Reunión con el equipo de desarrollo',
            'start' => now()->addDays(2)->setTime(14, 0), // Fecha y hora de inicio (ejemplo: pasado mañana a las 2 PM)
            'end' => now()->addDays(2)->setTime(16, 0), // Fecha y hora de finalización (ejemplo: pasado mañana a las 4 PM)
            'user_id' => 2, // ID del usuario que crea el evento (por ejemplo, un administrador)
        ]);
    }
}
