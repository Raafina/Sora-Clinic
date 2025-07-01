<?php

namespace Database\Seeders;

use App\Models\Medicine;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class MedicineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $medicines = [
            [
                'medicine_name' => 'Paracetamol',
                'packaging' => 'Tablet 500mg',
                'price' => 5000
            ],
            [
                'medicine_name' => 'Amoxicillin',
                'packaging' => 'Kapsul 500mg',
                'price' => 12000
            ],
            [
                'medicine_name' => 'Cetirizine',
                'packaging' => 'Tablet 10mg',
                'price' => 8000
            ],
            [
                'medicine_name' => 'Omeprazole',
                'packaging' => 'Kapsul 20mg',
                'price' => 15000
            ],
            [
                'medicine_name' => 'Ibuprofen',
                'packaging' => 'Tablet 400mg',
                'price' => 7000
            ],
            [
                'medicine_name' => 'Loratadine',
                'packaging' => 'Tablet 10mg',
                'price' => 9000
            ],
            [
                'medicine_name' => 'Metformin',
                'packaging' => 'Tablet 500mg',
                'price' => 10000
            ],
            [
                'medicine_name' => 'Simvastatin',
                'packaging' => 'Tablet 20mg',
                'price' => 25000
            ],
            [
                'medicine_name' => 'Aspirin',
                'packaging' => 'Tablet 80mg',
                'price' => 6000
            ],
            [
                'medicine_name' => 'Dexamethasone',
                'packaging' => 'Tablet 0.5mg',
                'price' => 18000
            ],
            [
                'medicine_name' => 'Furosemide',
                'packaging' => 'Tablet 40mg',
                'price' => 11000
            ],
            [
                'medicine_name' => 'Metronidazole',
                'packaging' => 'Tablet 500mg',
                'price' => 13000
            ],
            [
                'medicine_name' => 'Ranitidine',
                'packaging' => 'Tablet 150mg',
                'price' => 14000
            ],
            [
                'medicine_name' => 'Salbutamol',
                'packaging' => 'Inhaler 100mcg',
                'price' => 45000
            ],
            [
                'medicine_name' => 'Ciprofloxacin',
                'packaging' => 'Tablet 500mg',
                'price' => 20000
            ],
            [
                'medicine_name' => 'Diazepam',
                'packaging' => 'Tablet 5mg',
                'price' => 22000
            ],
            [
                'medicine_name' => 'Losartan',
                'packaging' => 'Tablet 50mg',
                'price' => 30000
            ],
            [
                'medicine_name' => 'Amlodipine',
                'packaging' => 'Tablet 5mg',
                'price' => 17000
            ],
            [
                'medicine_name' => 'Vitamin C',
                'packaging' => 'Tablet 500mg',
                'price' => 5000
            ],
            [
                'medicine_name' => 'Vitamin B Complex',
                'packaging' => 'Kapsul',
                'price' => 12000
            ]
        ];

        foreach ($medicines as $medicine) {
            Medicine::create($medicine);
        }
    }
}
