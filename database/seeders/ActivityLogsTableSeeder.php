<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ActivityLog;

class ActivityLogsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ActivityLog::create([
            'user_id' => 1, // ID del usuario responsable
            'table_name' => 'users', // Tabla afectada
            'changes' => 'Created a new user with ID 1', // Descripción de los cambios
        ]);

        ActivityLog::create([
            'user_id' => 2, // ID del usuario responsable
            'table_name' => 'courses', // Tabla afectada
            'changes' => 'Updated course details for course ID 101', // Descripción de los cambios
        ]);

        ActivityLog::create([
            'user_id' => 1, // ID del usuario responsable
            'table_name' => 'assignments', // Tabla afectada
            'changes' => 'Created a new assignment with ID 5', // Descripción de los cambios
        ]);
    }
}
