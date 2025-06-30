<?php

namespace Database\Seeders;

use App\Models\CheckupAppointment;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CheckupAppointmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $janji_periksas = [
            ['id_pasien' => 6,  'id_jadwal_periksa' => 1, 'keluhan' => 'Lorem ipsum...', 'no_antrian' => 6],
            ['id_pasien' => 7,  'id_jadwal_periksa' => 1, 'keluhan' => 'Lorem ipsum...', 'no_antrian' => 7],
            ['id_pasien' => 8,  'id_jadwal_periksa' => 1, 'keluhan' => 'Lorem ipsum...', 'no_antrian' => 8],
            ['id_pasien' => 9,  'id_jadwal_periksa' => 1, 'keluhan' => 'Lorem ipsum...', 'no_antrian' => 9],
            ['id_pasien' => 10, 'id_jadwal_periksa' => 1, 'keluhan' => 'Lorem ipsum...', 'no_antrian' => 10],
            ['id_pasien' => 11, 'id_jadwal_periksa' => 1, 'keluhan' => 'Lorem ipsum...', 'no_antrian' => 11],
            ['id_pasien' => 12, 'id_jadwal_periksa' => 1, 'keluhan' => 'Lorem ipsum...', 'no_antrian' => 12],
            ['id_pasien' => 13, 'id_jadwal_periksa' => 1, 'keluhan' => 'Lorem ipsum...', 'no_antrian' => 13],
            ['id_pasien' => 14, 'id_jadwal_periksa' => 1, 'keluhan' => 'Lorem ipsum...', 'no_antrian' => 14],
            ['id_pasien' => 15, 'id_jadwal_periksa' => 1, 'keluhan' => 'Lorem ipsum...', 'no_antrian' => 15],
            ['id_pasien' => 16, 'id_jadwal_periksa' => 1, 'keluhan' => 'Lorem ipsum...', 'no_antrian' => 16],

        ];

        foreach ($janji_periksas as $janji_periksa) {
            CheckupAppointment::create($janji_periksa);
        };
    }
}
