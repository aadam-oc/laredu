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
            'start' => now()->addDays(1)->setTime(9, 0), 
            'end' => now()->addDays(1)->setTime(11, 0), 
            'user_id' => 1,
        ]);

        CalendarEvent::create([
            'title' => 'Reunión de Equipo',
            'description' => 'Reunión con el equipo de desarrollo',
            'start' => now()->addDays(2)->setTime(14, 0), 
            'end' => now()->addDays(2)->setTime(16, 0), 
            'user_id' => 2, 
        ]);
    }
}
