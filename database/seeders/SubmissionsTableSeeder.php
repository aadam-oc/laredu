<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Carbon;

class SubmissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (!Schema::hasTable('submissions')) {
            return;
        }

        DB::table('submissions')->insert([
            [
                'user_id' => 1,
                'assignment_id' => 1,
                'submitted_at' => Carbon::now()->subDays(2),
                'grade' => 85.50,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 2,
                'assignment_id' => 1,
                'submitted_at' => Carbon::now()->subDay(),
                'grade' => 90.00,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
