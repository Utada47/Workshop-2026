<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class DosenFactory extends Factory
{
    public function definition(): array
    {
        return [
            'nip'  => $this->faker->unique()->numerify('####################'),
            'name' => $this->faker->name(),
        ];
    }
}
