<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        User::factory()->create([
            'name' => 'adamortcas',
            'email' => 'adamortcas@campus.monlau.com',
            'password' => bcrypt('password'),
        ]);
        User::factory()->create([
            'name' => 'Adam',
            'email' => 'Adam@gmail.com',
            'password' => bcrypt('password'),
        ]);
    }
}
