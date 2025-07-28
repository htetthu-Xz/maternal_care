<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Patient>
 */
class PatientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => rand(1, 20),
            'age' => rand(18, 45),
            'address' => $this->faker->address(),
            'blood_type' => $this->faker->randomElement(['A+', 'A-', 'B+', 'B-', 'O+', 'O-', 'AB+', 'AB-']),
            'father_name' => $this->faker->name(),
            'father_age' => rand(40, 70),
            'father_blood_group' => $this->faker->randomElement(['A+', 'A-', 'B+', 'B-', 'O+', 'O-', 'AB+', 'AB-']),
            'is_estimated_date_of_birth_known' => $this->faker->boolean(),
            'delivery_date' => null,
            'is_expect_selected_for_birth' => $this->faker->boolean(),
            'is_emergency_clinic' => $this->faker->boolean(),
            'has_decision_maker_in_emergency' => $this->faker->boolean(),
            'knows_how_to_get_money_in_emergency' => $this->faker->boolean(),
            'has_planned_transport_for_emergency' => $this->faker->boolean(),
            'has_basic_delivery_supplies' => $this->faker->boolean(),
            'has_planned_companion_for_birth_and_24h' => $this->faker->boolean(),
            'has_planned_helper_for_household_and_childcare' => $this->faker->boolean(),
        ];
    }
}
