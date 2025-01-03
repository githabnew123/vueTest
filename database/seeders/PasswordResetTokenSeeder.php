<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PasswordResetTokenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('password_reset_tokens')->insert([
            [
                'email' => 'john.doe@example.com',
                'token' => bcrypt('sample_token_1'),
                'created_at' => now(),
            ],
            [
                'email' => 'jane.doe@example.com',
                'token' => bcrypt('sample_token_2'),
                'created_at' => now(),
            ],
        ]);
    }
}
