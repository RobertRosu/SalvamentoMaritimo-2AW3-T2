<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Travel;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Rescue>
 */
class RescueFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'travel_id' => Travel::inRandomOrder()->first()->id,  
            'numero_rescatados' => fake()->numberBetween(1, 100),     
        ];
    }
}
