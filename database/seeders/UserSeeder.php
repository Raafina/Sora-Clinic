<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'nama' => 'Dr. Anisa Farida, Sp.A',
            'username' => 'anisa_farida',
            'email' => 'anisa_farida@example.com',
            'alamat' => 'Semarang Kota, Jawa Tengah',
            'no_ktp' => '1234567890123456',
            'no_hp' => '08123456789',
            'no_rm' => '',
            'poli' => '1',
            'role' => 'dokter',
            'password' => Hash::make('12345678')
        ]);
    }
}
