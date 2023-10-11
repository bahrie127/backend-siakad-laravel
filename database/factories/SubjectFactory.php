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
        // $table->string('title');
        // $table->bigInteger('lecturer_id')->unsigned();
        // //semester
        // $table->string('semester');
        // //tahun akademik
        // $table->string('academic_year');
        // //sks
        // $table->integer('sks');
        // //kode matakuliah
        // $table->string('code');
        // //deskripsi
        // $table->text('description');
        return [
            'title' => $this->faker->sentence(3),
            'lecturer_id' => \App\Models\User::factory(),
            'semester' => 'Ganjil',
            'academic_year' => '2021/2022',
            'sks' => 3,
            'code' => $this->faker->unique()->regexify('[A-Z]{3}[0-9]{3}'),
            'description' => $this->faker->paragraph(3),
        ];
    }
}
