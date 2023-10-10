<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Khs>
 */
class KhsFactory extends Factory
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
            'nilai' => $this->faker->randomDigit(2),
            'grade' => $this->faker->word,
            'keterangan' => $this->faker->word,
            'tahun_akademik' => $this->faker->word,
            'semester' => $this->faker->randomDigit(1),
            'status' => $this->faker->word,
            'created_by' => $this->faker->word,
            'updated_by' => $this->faker->word,
            'deleted_by' => $this->faker->word,
        ];
    }
}
