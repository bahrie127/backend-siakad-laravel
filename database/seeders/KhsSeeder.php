<?php

namespace Database\Seeders;

use App\Models\Khs;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KhsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Khs::factory(50)->create();
        Khs::factory()->count(150)->create();
    }
}
