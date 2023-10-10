<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\AbsensiMatkul>
 */
class AbsensiMatkulFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'mahasiswa_id' => \App\Models\User::factory(),
            'matakuliah_id' => \App\Models\Subject::factory(),
            'pertemuan' => $this->faker->word,
            'status' => $this->faker->word,
            'keterangan' => $this->faker->word,
            'tahun_akademik' => $this->faker->word,
            'semester' => $this->faker->randomDigit(1),
            'kode_absensi' => $this->faker->word,
            'latitude' => $this->faker->word,
            'longitude' => $this->faker->word,
            'nilai' => $this->faker->randomDigit(2),
            'created_by' => $this->faker->word,
            'updated_by' => $this->faker->word,
            'deleted_by' => $this->faker->word,
        ];
    }
}
