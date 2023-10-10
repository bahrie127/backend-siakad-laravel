<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Schedule>
 */
class ScheduleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // $table->foreignId('subject_id')->constrained('subjects');
        // $table->string('hari');
        // $table->string('jam_mulai');
        // $table->string('jam_selesai');
        // $table->string('ruangan');
        // $table->string('tahun_akademik');
        // $table->string('semester');
        // $table->string('created_by');
        // $table->string('updated_by');
        // $table->string('deleted_by')->nullable();
        return [
            'subject_id' => \App\Models\Subject::factory(),
            'hari' => $this->faker->word,
            'jam_mulai' => $this->faker->word,
            'jam_selesai' => $this->faker->word,
            'ruangan' => $this->faker->word,
            'tahun_akademik' => $this->faker->word,
            'semester' => $this->faker->randomDigit(1),
            'created_by' => $this->faker->word,
            'updated_by' => $this->faker->word,
            'deleted_by' => $this->faker->word,
        ];
    }
}
