<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class MedicalHistoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $lastMenstruationDate = $this->faker->dateTimeBetween('-1 year', 'now')->format('Y-m-d');
        return [
            'registered_date' => $this->faker->dateTimeBetween('-1 year', 'now')->format('Y-m-d'),
            'last_menstruation_date' => $lastMenstruationDate,
            'estimated_delivery_date' => $lastMenstruationDate ? date('Y-m-d', strtotime($lastMenstruationDate . ' +280 days')) : null,
            'last_birth_or_miscarriage_date' => $this->faker->dateTimeBetween('-2 years', 'now')->format('Y-m-d'),
            'pregnancy_count' => $this->faker->numberBetween(0, 5),
            'education_level' => $this->faker->randomElement(['Primary', 'Secondary',   'Higher Secondary', 'Graduate', 'Postgraduate']),
            'has_birth_defect_history' => $this->faker->boolean(),
            'smokes' => $this->faker->boolean(),
            'chews_betel' => $this->faker->boolean(),
            'allergic_medicines' => $this->faker->sentence(),
            'current_medicines' => $this->faker->sentence(),
            'disease_history' => $this->faker->paragraph(),
            'other_diseases' => $this->faker->sentence(),
            'used_birth_control' => $this->faker->boolean(),
            'birth_control_method' => $this->faker->randomElement(['Pill', 'Condom', 'IUD', 'Implant', 'Injection']),
            'birth_control_duration' => $this->faker->randomElement(['Short-term', 'Long-term']),
            'hiv_syphilis_counseling' => $this->faker->boolean(),
            'deworming_given' => $this->faker->boolean(),
            'iron_supplement_given' => $this->faker->boolean(),
            'tt_vaccine_1_date' => $this->faker->dateTimeBetween('-1 year', 'now')->format('Y-m-d'),
            'tt_vaccine_2_date' => $this->faker->dateTimeBetween('-1 year', 'now')->format('Y-m-d'),
        ];
    }
}
