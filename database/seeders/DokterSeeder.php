<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Dokter;
use Illuminate\Support\Facades\Hash;

class DokterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // User Dokter
        $userKokterAnak = User::create([
            'username' => 'dokter1',
            'password' => Hash::make('12345'),
            'role' => 'dokter'
        ]);

        $userDokterUmum = User::create([
            'username' => 'dokter2',
            'password' => Hash::make('12345'),
            'role' => 'dokter'
        ]);

        $userDokterJantung = User::create([
            'username' => 'dokter3',
            'password' => Hash::make('12345'),
            'role' => 'dokter'
        ]);

        $userDokterKandungan = User::create([
            'username' => 'dokter4',
            'password' => Hash::make('12345'),
            'role' => 'dokter'
        ]);

        // Data Dokter
        $dataDokterAnak = Dokter::create([
            'user_id' => $userKokterAnak->id,
            'nama' => 'Dr. Anisa Farida, Sp.A.',
            'alamat' => 'Semarang, Jawa Tengah',
            'no_telp' => '081-2345-6789',
            'id_poli' => 1,
        ]);
        $dataDokterUmum = Dokter::create([
            'user_id' => $userDokterUmum->id,
            'nama' => 'Dr. Rudi Santoso, Sp.PD.',
            'alamat' => 'Semarang, Jawa Tengah',
            'no_telp' => '081-2345-6789',
            'id_poli' => 1,
        ]);
        $dataDokterJantung = Dokter::create([
            'user_id' => $userDokterJantung->id,
            'nama' => 'Dr. Andi Wijaya, Sp.JP',
            'alamat' => 'Semarang, Jawa Tengah',
            'no_telp' => '081-2345-6789',
            'id_poli' => 1,
        ]);
        $dataDokterKandungan = Dokter::create([
            'user_id' => $userDokterKandungan->id,
            'nama' => 'Dr. Siti Rahmawati, Sp.OG',
            'alamat' => 'Semarang, Jawa Tengah',
            'no_telp' => '081-2345-6789',
            'id_poli' => 1,
        ]);
    }
}
