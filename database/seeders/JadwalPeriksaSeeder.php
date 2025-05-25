<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\JadwalPeriksa;
use App\Models\User;

class JadwalPeriksaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $dokter = User::where('email', 'anisa_farida@example.com')->first();

        if ($dokter) {
            JadwalPeriksa::create([
                'id_dokter' => $dokter->id,
                'hari' => 'Senin',
                'jam_mulai' => '08:00',
                'jam_selesai' => '10:00',
                'isAktif' => true
            ]);
            JadwalPeriksa::create([
                'id_dokter' => $dokter->id,
                'hari' => 'Senin',
                'jam_mulai' => '12:00',
                'jam_selesai' => '14:00',
                'isAktif' => true
            ]);
            JadwalPeriksa::create([
                'id_dokter' => $dokter->id,
                'hari' => 'Senin',
                'jam_mulai' => '13:00',
                'jam_selesai' => '15:00',
                'isAktif' => true
            ]);
            JadwalPeriksa::create([
                'id_dokter' => $dokter->id,
                'hari' => 'Selasa',
                'jam_mulai' => '08:00',
                'jam_selesai' => '10:00',
                'isAktif' => true
            ]);
            JadwalPeriksa::create([
                'id_dokter' => $dokter->id,
                'hari' => 'Selasa',
                'jam_mulai' => '12:00',
                'jam_selesai' => '14:00',
                'isAktif' => true
            ]);
            JadwalPeriksa::create([
                'id_dokter' => $dokter->id,
                'hari' => 'Selasa',
                'jam_mulai' => '13:00',
                'jam_selesai' => '15:00',
                'isAktif' => true
            ]);
            JadwalPeriksa::create([
                'id_dokter' => $dokter->id,
                'hari' => 'Rabu',
                'jam_mulai' => '08:00',
                'jam_selesai' => '10:00',
                'isAktif' => true
            ]);
            JadwalPeriksa::create([
                'id_dokter' => $dokter->id,
                'hari' => 'Rabu',
                'jam_mulai' => '12:00',
                'jam_selesai' => '14:00',
                'isAktif' => true
            ]);
            JadwalPeriksa::create([
                'id_dokter' => $dokter->id,
                'hari' => 'Rabu',
                'jam_mulai' => '13:00',
                'jam_selesai' => '15:00',
                'isAktif' => true
            ]);
            JadwalPeriksa::create([
                'id_dokter' => $dokter->id,
                'hari' => 'Kamis',
                'jam_mulai' => '08:00',
                'jam_selesai' => '10:00',
                'isAktif' => true
            ]);
            JadwalPeriksa::create([
                'id_dokter' => $dokter->id,
                'hari' => 'Kamis',
                'jam_mulai' => '12:00',
                'jam_selesai' => '14:00',
                'isAktif' => true
            ]);
            JadwalPeriksa::create([
                'id_dokter' => $dokter->id,
                'hari' => 'Kamis',
                'jam_mulai' => '13:00',
                'jam_selesai' => '15:00',
                'isAktif' => true
            ]);
        }
    }
}
