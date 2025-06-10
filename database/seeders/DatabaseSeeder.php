<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\PlayerSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Tonny Weslley',
            'email' => 'tonny.weslley@overall.com',
            'password' => 'pass1234',
        ]);
        $this->command->info('User Tonny Weslley created successfully.');
        User::factory()->create([
            'name' => 'Leonardo Alves',
            'email' => 'leo.alves@overall.com',
            'password' => 'pass1234',
        ]);
        $this->command->info('User Leonardo Alves created successfully.');
        User::factory()->create([
            'name' => 'Lucas Gabriel',
            'email' => 'lucas.gabriel@overall.com',
            'password' => 'pass1234',
        ]);
        $this->command->info('User Lucas Gabriel created successfully.');
        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@overall.com',
            'password' => 'pass1234',
        ]);
        $this->command->info('User Admin created successfully.');

        $this->command->info('Users created successfully.');

        $this->call([
            PlayerSeeder::class,
        ]);
        $this->call([
            PermissionsSeeder::class,
        ]);
        $this->command->info('Database seeded successfully.');
    }
}
