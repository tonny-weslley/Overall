<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Role;
use App\Models\Permission;
use App\Models\User;

class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create roles
        $adminRole = Role::firstOrCreate(['name' => 'admin']);
        $this->command->info('Admin role created or already exists.');
        Role::firstOrCreate(['name' => 'user']);
        $this->command->info('User role created or already exists.');

        // Create permissions
        $managePositionsPermission = Permission::firstOrCreate(['name' => 'manage_positions']);
        $this->command->info('Manage Positions permission created or already exists.');
        // Assign permissions to roles
        $adminRole->givePermissionTo($managePositionsPermission);
        $this->command->info('Admin permissions assigned.');

        // Assign the admin role to the admin@overall.com user
        $adminUser = User::where('email', 'admin@overall.com')->first();
        if ($adminUser) {
            $adminUser->assignRole($adminRole);
            $this->command->info('Admin role assigned to admin@overall.com');
        }
    }
}
