<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory(200)->create();

        User::create([
            'name' => 'Bahri Admin',
            'email' => 'bahri@fic8.com',
            'email_verified_at' => now(),
            'password' => Hash::make('12345678'),
            'roles' => 'admin',
        ]);
    }
}
