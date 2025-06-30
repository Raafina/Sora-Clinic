<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\CheckupSchedule;
use App\Models\User;

class CheckupScheduleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $dokter = User::where('email', 'anisa_farida@example.com')->first();

        if ($dokter) {
            $schedules = [
                ['hari' => 'Senin', 'jam_mulai' => '08:00', 'jam_selesai' => '10:00', 'status' => true],
                ['hari' => 'Senin', 'jam_mulai' => '12:00', 'jam_selesai' => '14:00', 'status' => false],
                ['hari' => 'Senin', 'jam_mulai' => '13:00', 'jam_selesai' => '15:00', 'status' => false],
                ['hari' => 'Selasa', 'jam_mulai' => '08:00', 'jam_selesai' => '10:00', 'status' => false],
                ['hari' => 'Selasa', 'jam_mulai' => '12:00', 'jam_selesai' => '14:00', 'status' => false],
                ['hari' => 'Selasa', 'jam_mulai' => '13:00', 'jam_selesai' => '15:00', 'status' => false],
                ['hari' => 'Rabu', 'jam_mulai' => '08:00', 'jam_selesai' => '10:00', 'status' => false],
                ['hari' => 'Rabu', 'jam_mulai' => '12:00', 'jam_selesai' => '14:00', 'status' => false],
                ['hari' => 'Rabu', 'jam_mulai' => '13:00', 'jam_selesai' => '15:00', 'status' => false],
                ['hari' => 'Kamis', 'jam_mulai' => '08:00', 'jam_selesai' => '10:00', 'status' => false],
                ['hari' => 'Kamis', 'jam_mulai' => '12:00', 'jam_selesai' => '14:00', 'status' => false],
                ['hari' => 'Kamis', 'jam_mulai' => '13:00', 'jam_selesai' => '15:00', 'status' => false],
            ];

            foreach ($schedules as $schedule) {
                CheckupSchedule::create([
                    'id_dokter' => $dokter->id,
                    'hari' => $schedule['hari'],
                    'jam_mulai' => $schedule['jam_mulai'],
                    'jam_selesai' => $schedule['jam_selesai'],
                    'status' => $schedule['status']
                ]);
            }
        }
    }
}
