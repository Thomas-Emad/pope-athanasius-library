<?php

namespace Database\Seeders;

use App\Enums\RoleUserEnum;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Thomas Emad',
            'email' => 'thomas@gmail.com',
            'password' => Hash::make('123456'),
            'role' => RoleUserEnum::OWNER
        ]);
    }
}
