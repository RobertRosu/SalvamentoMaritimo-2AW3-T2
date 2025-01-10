<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CrewMember>
 */
class CrewMemberFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'rol' => fake()->randomElement(['kapitaina', 'makinen arduraduna', 'mekanikoa', 'zubiko ofiziala', 'marinela', 'erizaina']),
        ];
    }
}
