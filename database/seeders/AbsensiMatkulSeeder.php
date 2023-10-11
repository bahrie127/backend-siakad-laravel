<?php

namespace Database\Seeders;

use App\Models\AbsensiMatkul;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AbsensiMatkulSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        AbsensiMatkul::factory(150)->create();
    }
}
