<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::factory()->create();
        User::create([
            'name' => 'Jorge',
            'email' => 'jorge@email.com',
            'email_verified_at' => now(),
            'password' => '1234', // password
            'remember_token' => 1234567890,
        ]);
    }
}
