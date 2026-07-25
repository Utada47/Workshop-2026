<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class MatakuliahFactory extends Factory
{
    public function definition(): array
    {
        $prefix = $this->faker->randomElement(['TIF', 'SIF', 'IKO', 'MKU']);
        $kode   = $prefix . $this->faker->unique()->numerify('###');

        $matakuliah = [
            'Algoritma dan Pemrograman',
            'Basis Data',
            'Jaringan Komputer',
            'Pemrograman Web',
            'Sistem Operasi',
            'Kecerdasan Buatan',
            'Matematika Diskrit',
            'Rekayasa Perangkat Lunak',
        ];

        return [
            'kode'            => $kode,
            'nama_matakuliah' => $this->faker->randomElement($matakuliah),
            'sks'             => $this->faker->randomElement([2, 3, 4]),
        ];
    }
}
