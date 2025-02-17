<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Permission;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::create([
            'name' => 'view_dashboard',
        ]);

        Permission::create([
            'name' => 'edit_posts',
        ]);

        Permission::create([
            'name' => 'delete_users',
        ]);

        Permission::create([
            'name' => 'manage_permissions',
        ]);

        Permission::create([
            'name' => 'create_events',
        ]);
    }
}
