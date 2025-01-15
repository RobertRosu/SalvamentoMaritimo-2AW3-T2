<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Doctor>
 */
class DoctorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $status = fake()->randomElement(['Aktibo', 'Inaktibo', 'Bajan']);
        $start_date = fake()->date();


        $stop_date = null;
        if ($status !== 'Aktibo') {
            $stop_date = fake()->dateTimeBetween($start_date, '+30 days')->format('Y-m-d');
        }
                
        return [
            'name' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'start_date' => $start_date,
            'rol' => 'Medikua',
            'status' => $status,
            'stop_date' => $stop_date,
            'reason' => match ($status) {
                'Aktibo' => null,
                'Inaktibo' => fake()->randomElement(['Jubilazioa', 'Arrazoi pertsonalak']),
                'Bajan' => fake()->randomElement(['Gaixotasuna', 'Istripua', 'Beste arrazoi bat']),
            },
        ];
    }
}
