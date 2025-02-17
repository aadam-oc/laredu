<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Subject;

class SubjectsTableSeeder extends Seeder
{
    public function run()
    {
        Subject::create([
            'name' => 'Matemáticas',
            'course_id' => 1,  
            'teacher_id' => 1
        ]);

        Subject::create([
            'name' => 'Historia',
            'course_id' => 2,
            'teacher_id' => 2
        ]);
    }
}
