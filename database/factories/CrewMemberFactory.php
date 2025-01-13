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
        $status = fake()->randomElement(['Aktibo', 'Aktibo', 'Inaktibo', 'Bajan']);
        $start_date = fake()->date();


        $stop_date = null;
        if ($status !== 'Aktibo') {
            $stop_date = fake()->dateTimeBetween($start_date, '+30 days')->format('Y-m-d');
        }
                
        return [
            'name' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'rol' => fake()->randomElement(['Kapitaina', 'Makinen arduraduna', 'Mekanikoa', 'Zubiko ofiziala', 'Marinela', 'Erizaina']),
            'start_date' => $start_date,  
            'status' => $status,
            'stop_date' => $stop_date,
            'reason' => match ($status) {
                'Aktibo' => '',
                'Inaktibo' => fake()->randomElement(['Jubilazioa', 'Arrazoi pertsonalak']),
                'Bajan' => fake()->randomElement(['Gaixotasuna', 'Istripua', 'Beste arrazoi bat']),
            },
        ];
    }
}
