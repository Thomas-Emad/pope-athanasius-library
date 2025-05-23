<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User as UserModel;


class UserSeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    // Create owner User
    $owner =   UserModel::factory()->create([
      'name' => 'Owner',
      'email' => 'owner@gmail.com',
      'password' => Hash::make('1234560')
    ]);
    $owner->assignRole([1]); // default role is owner also it first one created in db his id is 1
  }
}
