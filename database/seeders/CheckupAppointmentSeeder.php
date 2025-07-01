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
            ['id_patient' => 6,  'id_checkup_schedule' => 1, 'complaint' => 'Lorem ipsum...', 'queue_number' => 6],
            ['id_patient' => 7,  'id_checkup_schedule' => 1, 'complaint' => 'Lorem ipsum...', 'queue_number' => 7],
            ['id_patient' => 8,  'id_checkup_schedule' => 1, 'complaint' => 'Lorem ipsum...', 'queue_number' => 8],
            ['id_patient' => 9,  'id_checkup_schedule' => 1, 'complaint' => 'Lorem ipsum...', 'queue_number' => 9],
            ['id_patient' => 10, 'id_checkup_schedule' => 1, 'complaint' => 'Lorem ipsum...', 'queue_number' => 10],
            ['id_patient' => 11, 'id_checkup_schedule' => 1, 'complaint' => 'Lorem ipsum...', 'queue_number' => 11],
            ['id_patient' => 12, 'id_checkup_schedule' => 1, 'complaint' => 'Lorem ipsum...', 'queue_number' => 12],
            ['id_patient' => 13, 'id_checkup_schedule' => 1, 'complaint' => 'Lorem ipsum...', 'queue_number' => 13],
            ['id_patient' => 14, 'id_checkup_schedule' => 1, 'complaint' => 'Lorem ipsum...', 'queue_number' => 14],
            ['id_patient' => 15, 'id_checkup_schedule' => 1, 'complaint' => 'Lorem ipsum...', 'queue_number' => 15],
            ['id_patient' => 16, 'id_checkup_schedule' => 1, 'complaint' => 'Lorem ipsum...', 'queue_number' => 16],

        ];

        foreach ($janji_periksas as $janji_periksa) {
            CheckupAppointment::create($janji_periksa);
        };
    }
}
