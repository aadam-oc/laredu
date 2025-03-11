<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Carbon;

class AssignmentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (!Schema::hasTable('assignments')) {
            return;
        }

        DB::table('assignments')->insert([
            [
                'title' => 'Introduction to Laravel',
                'description' => 'Basic introduction to Laravel framework.',
                'due_date' => Carbon::now()->addDays(7),
                'subject_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Database Migrations',
                'description' => 'Understanding and working with Laravel migrations.',
                'due_date' => Carbon::now()->addDays(10),
                'subject_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Eloquent ORM Basics',
                'description' => 'Learning how to use Eloquent for database interactions.',
                'due_date' => Carbon::now()->addDays(14),
                'subject_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
