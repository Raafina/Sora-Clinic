<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\JadwalPeriksa;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            PolyclinicSeeder::class,
            UserSeeder::class,
            JadwalPeriksaSeeder::class,
            // JanjiPeriksaSeeder::class,
            ObatSeeder::class
        ]);
    }
}
