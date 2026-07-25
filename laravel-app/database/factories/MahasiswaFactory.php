<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class MahasiswaFactory extends Factory
{
    protected $model = \App\Models\Mahasiswa::class;

    public function definition(): array
    {
        return [
            'stambuk' => (string) $this->faker->unique()->numberBetween(20200001, 20259999),
            'name' => $this->faker->name(),
            'jurusan' => $this->faker->randomElement([
                'Teknik Informatika', 'Sistem Informasi', 'Ilmu Komputer',
            ]),
        ];
    }
}
