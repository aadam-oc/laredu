<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Course;

class CoursesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Course::create([
            'name' => 'Matemáticas',
            'description' => 'Curso introductorio a álgebra y geometría.',
        ]);

        Course::create([
            'name' => 'Historia',
            'description' => 'Curso sobre la historia mundial y civilizaciones antiguas.',
        ]);

        Course::create([
            'name' => 'Programación Web',
            'description' => 'Curso de desarrollo de aplicaciones web utilizando PHP, Laravel y JavaScript.',
        ]);
    }
}
