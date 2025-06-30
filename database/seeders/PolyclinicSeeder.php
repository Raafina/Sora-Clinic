<?php

namespace Database\Seeders;

use App\Models\Polyclinic;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PolyclinicSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $polyclinics = [
            ['id' => '1', 'name' => 'Poli Anak', 'description' => 'Ini adalah poli anak'],
            ['id' => '2', 'name' => 'Poli Umum', 'description' => 'Ini adalah poli umum'],
            ['id' => '3', 'name' => 'Poli Jantung', 'description' => 'Ini adalah poli jantung'],
            ['id' => '4', 'name' => 'Poli Kandungan', 'description' => 'Ini adalah poli kandungan'],
            ['id' => '5', 'name' => 'Poli Kulit & Kelamin', 'description' => 'Ini adalah poli kulit & kelamin']
        ];

        foreach ($polyclinics as $polyclinic) {
            Polyclinic::create($polyclinic);
        }
    }
}
