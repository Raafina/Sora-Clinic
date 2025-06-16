<?php

namespace Database\Seeders;

use App\Models\poliklinik;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PoliklinikSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $polikliniks = [
            ['id' => '1', 'nama' => 'Poli Anak', 'deskripsi' => 'Ini adalah poli anak'],
            ['id' => '2', 'nama' => 'Poli Umum', 'deskripsi' => 'Ini adalah poli umum'],
            ['id' => '3', 'nama' => 'Poli Jantung', 'deskripsi' => 'Ini adalah poli jantung'],
            ['id' => '4', 'nama' => 'Poli Kandungan', 'deskripsi' => 'Ini adalah poli kandungan'],
            ['id' => '5', 'nama' => 'Poli Kulit & Kelamin', 'deskripsi' => 'Ini adalah poli kulit & kelamin']
        ];

        foreach ($polikliniks as $poliklinik) {
            Poliklinik::create($poliklinik);
        }
    }
}
