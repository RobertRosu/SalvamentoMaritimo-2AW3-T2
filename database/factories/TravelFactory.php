<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Doctor;
use App\Models\CrewMember;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Travel>
 */
class TravelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'origen' => fake()->city(), 
            'destino' => fake()->city(), 
            'doctor_id' => Doctor::inRandomOrder()->first()->id, 
            'crewmember_id' => Crewmember::inRandomOrder()->first()->id,
        ];
    }
}
