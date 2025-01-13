<?php

namespace Database\Factories;
use App\Models\Rescue;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\RescuedPerson>
 */
class RescuedPersonFactory extends Factory
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
            'country' => fake()->randomElement(['Chad', 'Senegal', 'Senegal', 'Mali', 'Eritrea', 'Mauritania', 'Sudan', 'Libia']),
            'genre' => fake()->randomElement(['Hombre', 'Hombre', 'Hombre', 'Mujer', 'Mujer', 'Mujer', 'Otro']),
            'birth_date' => fake()->date(),  
            'rescue_id' => Rescue::inRandomOrder()->first()->id,            
            'photo_src' => fake()->imageUrl(),         
        ];
    }
}
