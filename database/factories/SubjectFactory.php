<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Subject>
 */
class SubjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
       
        return [
            'title' => $this->faker->word,
            'lecturer_id' => \App\Models\User::factory(),
            'semester' => $this->faker->randomDigit(1),
            'tahun_akademik' => $this->faker->randomDigit(2),
            'sks' => $this->faker->randomDigit(1),
            'kode_matakuliah' => $this->faker->word,
            'deskripsi' => $this->faker->word,
        ];
    }
}
