<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Schedule;
use App\Models\Transfer;
use App\Models\MedicalHistory;
use App\Models\PatientCareStep;
use Illuminate\Database\Seeder;
use Database\Factories\PatientFactory;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Admin User',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('123123123'),
            'role' => 'admin',
        ]);
    }
}
