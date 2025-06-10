<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Player;


class PlayerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
      $tonny = User::where('email', 'tonny.weslley@overall.com')->first();
      if (!$tonny) {
          $this->command->error('User Tonny Weslley not found.');
          return;
      }
      $this->command->info('User Tonny Weslley found successfully.');
      $leo = User::where('email', 'leo.alves@overall.com')->first();
      if (!$leo) {
          $this->command->error('User Leonardo Alves not found.');
          return;
      }
      $this->command->info('User Leonardo Alves found successfully.');
      $lucas = User::where('email', 'lucas.gabriel@overall.com')->first();
      if (!$lucas) {
          $this->command->error('User Lucas Gabriel not found.');
          return;
      }
      $this->command->info('User Lucas Gabriel found successfully.');

        Player::factory()->create([
            'favorite_number' => 12,
            'name' => 'Tonny Kroos',
            'user_id' => $tonny->id,
        ]);
        $this->command->info('Player for Tonny Weslley created successfully.');

        Player::factory()->create([
            'favorite_number' => 10,
            'name' => 'Leonardo Messi',
            'user_id' => $leo->id,
        ]);
        $this->command->info('Player for Leonardo Alves created successfully.');

        Player::factory()->create([
            'favorite_number' => 7,
            'name' => 'V0ltmx',
            'user_id' => $lucas->id,
        ]);
        $this->command->info('Player for Lucas Gabriel created successfully.');
        $this->command->info('Players created successfully.');
        $this->command->info('PlayerSeeder completed successfully.');
    }
}
