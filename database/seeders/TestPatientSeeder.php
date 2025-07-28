<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\Patient;
use App\Models\Schedule;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TestPatientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        date_default_timezone_set('Asia/Yangon');
        $today = Carbon::now();

        // 1. New Patients
        Patient::factory(5)->create([
            'created_at' => $today,
        ]);

        // 2. Return Patients
        $returnPatients = Patient::factory(5)->create([
            'created_at' => $today->copy()->subDays(15),
            'patient_care_step' => 'return',
        ]);
        foreach ($returnPatients as $patient) {
            Schedule::create([
                'patient_id' => $patient->id,
                'type' => 'AN',
                'number' => rand(1, 8),
                'visit_date' => $today,
                'visited' => true,
            ]);
        }

        // 3. Missed Return Patients
        $missedPatients = Patient::factory(5)->create([
            'created_at' => $today->copy()->subDays(20),
            'patient_care_step' => 'return',
        ]);
        foreach ($missedPatients as $patient) {
            Schedule::create([
                'patient_id' => $patient->id,
                'type' => 'AN',
                'number' => rand(1, 8),
                'visit_date' => $today->copy()->subDays(1),
                'visited' => false,
            ]);
        }

        // 4. Delivered Patients
        $deliveredPatients = Patient::factory(5)->create([
            'created_at' => $today->copy()->subDays(60),
            'delivery_date' => $today->copy()->subDays(7),
            'patient_care_step' => 'delivered',
        ]);
        foreach ($deliveredPatients as $patient) {
            foreach ([1, 3, 7, 42] as $i => $days) {
                Schedule::create([
                    'patient_id' => $patient->id,
                    'type' => 'PNC',
                    'number' => $i + 1,
                    'visit_date' => $patient->delivery_date->copy()->addDays($days),
                    'visited' => false,
                ]);
            }
        }

        // 5. Transferred Patients
        $transferred = Patient::factory(3)->create([
            'created_at' => $today->copy()->subDays(30),
            'patient_care_step' => 'transferred',
        ]);
        foreach ($transferred as $patient) {
            Transfer::create([
                'patient_id' => $patient->id,
                'transfer_date' => $today->copy()->subDays(1),
                'transfer_reason' => 'Complication',
                'transfer_to' => 'Yangon General Hospital',
                'transfer_condition' => 'Stable',
                'transfer_treatment' => 'Referred with report',
            ]);
        }

        // 6. Emergency Patients
        Patient::factory(2)->create([
            'type' => 'emergency',
            'created_at' => $today,
        ]);
    }
}
