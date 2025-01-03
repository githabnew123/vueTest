<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'PPA_DEV',
            'email' => 'ppa@dev.com',
            'password' => Hash::make('password'),
        ]);

        User::factory(10)->create(); // If using factories for additional data
    }
}
