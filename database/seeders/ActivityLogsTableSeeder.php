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
            'user_id' => 1, 
            'table_name' => 'users', 
            'changes' => 'Created a new user with ID 1', 
        ]);

        ActivityLog::create([
            'user_id' => 2, 
            'table_name' => 'courses', 
            'changes' => 'Updated course details for course ID 101', 
        ]);

        ActivityLog::create([
            'user_id' => 1, 
            'table_name' => 'assignments', 
            'changes' => 'Created a new assignment with ID 5',
        ]);
    }
}
