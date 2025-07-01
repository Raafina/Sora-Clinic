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
                ['day' => 'Senin', 'start_time' => '08:00', 'end_time' => '10:00', 'status' => true],
                ['day' => 'Senin', 'start_time' => '12:00', 'end_time' => '14:00', 'status' => false],
                ['day' => 'Senin', 'start_time' => '13:00', 'end_time' => '15:00', 'status' => false],
                ['day' => 'Selasa', 'start_time' => '08:00', 'end_time' => '10:00', 'status' => false],
                ['day' => 'Selasa', 'start_time' => '12:00', 'end_time' => '14:00', 'status' => false],
                ['day' => 'Selasa', 'start_time' => '13:00', 'end_time' => '15:00', 'status' => false],
                ['day' => 'Rabu', 'start_time' => '08:00', 'end_time' => '10:00', 'status' => false],
                ['day' => 'Rabu', 'start_time' => '12:00', 'end_time' => '14:00', 'status' => false],
                ['day' => 'Rabu', 'start_time' => '13:00', 'end_time' => '15:00', 'status' => false],
                ['day' => 'Kamis', 'start_time' => '08:00', 'end_time' => '10:00', 'status' => false],
                ['day' => 'Kamis', 'start_time' => '12:00', 'end_time' => '14:00', 'status' => false],
                ['day' => 'Kamis', 'start_time' => '13:00', 'end_time' => '15:00', 'status' => false],
            ];

            foreach ($schedules as $schedule) {
                CheckupSchedule::create([
                    'id_doctor' => $dokter->id,
                    'day' => $schedule['day'],
                    'start_time' => $schedule['start_time'],
                    'end_time' => $schedule['end_time'],
                    'status' => $schedule['status']
                ]);
            }
        }
    }
}
