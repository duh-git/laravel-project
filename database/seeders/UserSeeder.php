<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Hash;

class UserSeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    User::create([
      'name' => 'moderator',
      'email' => 'moderator@mail.ru',
      'password' => Hash::make('12345678'),
      'role_id' => 1,
    ]);
    User::create([
      'name' => 'reader',
      'email' => 'reader@mail.ru',
      'password' => Hash::make('12345678'),
      'role_id' => 2,
    ]);
  }
}
