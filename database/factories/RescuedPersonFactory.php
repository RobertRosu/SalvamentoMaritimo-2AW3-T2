<?php

namespace Database\Factories;
use App\Models\Rescue;
use App\Models\Travel;

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
            'genre' => fake()->randomElement(['Gizona', 'Gizona', 'Gizona', 'Emakumea', 'Emakumea', 'Emakumea', 'Beste bat']),
            'birth_date' => fake()->date(),  
            'rescue_id' => Rescue::inRandomOrder()->first()->id, 
            'doctor_id' => function (array $attributes) {
                // Recuperar el rescue que tiene el travel_id
                $rescue = Rescue::find($attributes['rescue_id']);
                
                // Recuperar el doctor_id de la tabla travel usando el travel_id de la tabla rescue
                if ($rescue && $rescue->travel_id) {
                    $travel = Travel::find($rescue->travel_id);
                    return $travel ? $travel->doctor_id : null;
                }
                
                return null; // En caso de que no haya un travel_id o doctor_id
            },
            'diagnostic' => fake()->randomElement(['Deshidratazioa', 'Desnutrizioa', 'Osasuntsu']),
            'photo_src' => function (array $attributes) {
                
                $endpoint = '';
                
                if($attributes['genre'] == 'Gizona'){
                    $endpoint = 'male';
                }

                if($attributes['genre'] == 'Emakumea'){
                    $endpoint = 'female';
                }

                if($attributes['genre'] == 'Beste bat'){
                    $endpoint = rand(0, 1) ? 'male' : 'female';
                }
                // %20ko probabilitatea du argazkirik ez izatea
                return fake()->optional(0.8, null)->randomElement(["https://xsgames.co/randomusers/avatar.php?g=$endpoint"]);
            },         
        ];
    }
}
